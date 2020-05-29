<?php


namespace DataLibrary;

use DateTime;
use Exception;
use UserInterface\IdDocumentModel;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
include_once 'DataLibrary/BusinessLogic/UserProcessor.php';
include_once 'DataLibrary/BusinessLogic/PasswordProcessor.php';
include_once 'DataLibrary/BusinessLogic/MailProcessor.php';
include_once 'DataLibrary/BusinessLogic/NotificationProcessor.php';

class RegisterProcessor
{
    const MAXALLOWEDRESETTIME = 10;

    public static function registerUser($userModel)
    {
        $existingUser = UserProcessor::getUserByEmail($userModel->getEmail());

        if ($existingUser == UserProcessor::returnNullUser()) {
            $hashedPassword = PasswordProcessor::hashPassword($userModel->getPassword());

            try {
                UserProcessor::createUserBasic(
                    $userModel->getFirstName(),
                    $userModel->getSecondName(),
                    $userModel->getLastName(),
                    $hashedPassword,
                    $userModel->getEmail()
                );

                $existingUser = UserProcessor::getUserByEmail($userModel->getEmail());

                NotificationProcessor::sendConfirmationMail($userModel->getEmail(), $existingUser->getUserToken(), $existingUser->getUserId());
                return ['return' => 1, 'error' => 'Ok'];
            } catch (Exception $e) {
                return ['return' => 0, 'error' => "Exception caught creating user: " . $e->getMessage()];
            }
        } else {
            $existingUser->setPassword(null);
            $userModel->setPassword(null);
            return ['return' => 0, 'error' => "Użytkownik o podanym email już istnieje."];
        }


    }


    public static function loginUser($userModel)
    {
        $existingUser = UserProcessor::getUserByEmail($userModel->getEmail());

        if ($existingUser == UserProcessor::returnNullUser()) {
            return ['return' => 0, 'error' => "Nieprawidłowa nazwa użytkownika lub hasło "];
        } else {
            $userStatus = $existingUser->getUserStatus();

            switch ($userStatus) {
                case 'M':
                    return ['return' => 0, 'error' => "Proszę zweryfikować adres email"];
                case 'D':
                    return ['return' => 0, 'error' => "Proszę skorzystać z odnośnika z wiadomości email"];
                case 'B':
                    return ['return' => 0, 'error' => "Trwa weryfikacja przez pracownika Banku"];
                case 'A':
                    if (password_verify($userModel->getPassword(), $existingUser->getPassword())) {
                        return ['return' => 1, 'error' => "Ok"];
                    } else {
                        return ['return' => 0, 'error' => "Nieprawidłowa nazwa użytkownika lub hasło"];
                    }
                    break;
                default:
                    return ['return' => 0, 'error' => "Nieprawidłowy status użytkownika: " . $userStatus];
            }
        }
    }

    public static function changePassword($newPassword, $userId)
    {
        try {
            $passHash = PasswordProcessor::hashPassword($newPassword);
            UserProcessor::updateUserPassword($passHash, $userId);
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function verifyRegistrationEmail($codeToVerify, $userToken)
    {
        //TODO: refactor to use join on users and notifications
        $user = UserProcessor::getUserByToken($userToken);
        $email = MailProcessor::getNewestEmailDetailsByUserId($user->getUserId(), 'V');

        if (!empty($email->getId())) {
            if ($email->getVerifCode() == $codeToVerify) {
//                MailProcessor::updateCodeStatus('Y', $email->getId());
//                UserProcessor::updateUserStatus('D', $email->getRecipientId());
                return 1;
            }
        }
        return 0;
    }

    public static function verifyRecoveryLink($codeToVerify, $userId)
    {
        $newestEmail = MailProcessor::getNewestEmailDetailsByUserId($userId, 'R');
        if (!empty($newestEmail->getId())) {
            if ($newestEmail->getVerifCode() == $codeToVerify) {
                $sendTime = date_create_from_format('Y-m-d H:i:s', $newestEmail->getSendDate());
                $currentDate = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s', time()));
                $interval = date_diff($currentDate, $sendTime)->format('%i');

                if ($interval < self::MAXALLOWEDRESETTIME) {
                    return 1;
                }
            }
        }
        return 0;
    }

    public static function sendRecoveryMail($userModel)
    {
        $existingUser = UserProcessor::getUserByEmail($userModel->getEmail());
        if ($existingUser == UserProcessor::returnNullUser()) {
            return ['return' => 0, 'error' => "Nie ma takiego użytkownika"];
        } elseif ($existingUser->getUserStatus() == 0) {
            return ['return' => 0, 'error' => "Proszę najpierw zweryfikować adres email "];
        } else {
            NotificationProcessor::sendRecoveryMail($userModel->getEmail(), $existingUser->getUserId());
            return ['return' => 1, 'error' => "Przesłano instrukcję resetowania hasła"];
        }
    }
}
