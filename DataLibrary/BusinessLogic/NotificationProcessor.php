<?php


namespace DataLibrary;
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
include_once 'DataLibrary/Models/MailModel.php';
include_once 'DataLibrary/BusinessLogic/MailProcessor.php';
include_once 'DataLibrary/Models/GUIDGenerator.php';


class NotificationProcessor
{

    public static function sendConfirmationMail($recipientAddress, $userToken, $recipientId)
    {
        $subject = "Weryfikacja konta email FakeBank";
        $path = $_SERVER["DOCUMENT_ROOT"] . '/gr4/' . '/DataLibrary/Models/Templates/ConfEmailTemplate.html';
        $guid = GUIDGenerator::getGUID();
        $confirmLink = "http://wikomp.edu.pl/gr4/verify?guid=$guid&id=$userToken";
        $substArray = ['message' => 'Dziękujemy za zarejestrowanie konta w FakeBank. <br>W celu zweryfikowania adresu email, prosimy o użycie przycisku poniżej:',
            'verificationLink' => $confirmLink,
            'buttonText' => 'Zweryfikuj email!'];
        echo $confirmLink;

        $message = MailProcessor::prepareMessage($path, $substArray);

        $mail = MailProcessor::composeMail($recipientAddress, $subject, $message, $recipientId, $guid);
        $mail->setMessageType('M');
        $mail->setNotifType('V');
        $mail->setIsSent('N');

        try {
            if (MailProcessor::sendMail($mail)) {
                $mail->setIsSent('Y');
            }
        } catch (\Exception $e) {
            echo 'Exception while sending mail: ' . $e->getMessage();
        } finally {
            try {
                self::storeMail($mail);
            } catch (\Exception $e) {
                echo 'Exception while email storing in database: ' . $e->getMessage();
            }
        }
    }

    public static function sendRecoveryMail($recipientAddress, $recipientId)
    {
        $subject = "Resetowanie hasła FakeBank";
        $path = $_SERVER["DOCUMENT_ROOT"] . '/gr4/' . '/DataLibrary/Models/Templates/ConfEmailTemplate.html';
        $guid = GUIDGenerator::getGUID();
        $recoverLink = "http://wikomp.edu.pl/gr4/forgotPassword?guid=$guid&id=$recipientId";
        $substArray = ['message' => 'Zażądano resetu hasła. <br> Proszę użyć przycisku poniżej:',
            'verificationLink' => $recoverLink,
            'buttonText' => 'Resetuj hasło!'];
        echo $recoverLink;

        $message = MailProcessor::prepareMessage($path, $substArray);

        $mail = MailProcessor::composeMail($recipientAddress, $subject, $message, $recipientId, $guid);
        $mail->setMessageType('M');
        $mail->setNotifType('R');
        $mail->setIsSent('N');
        try {
            if (MailProcessor::sendMail($mail)) {
                $mail->setIsSent('Y');
            }
        } catch (\Exception $e) {
            echo 'Exception while sending mail: ' . $e->getMessage();
        } finally {
            try {
                self::storeMail($mail);
            } catch (\Exception $e) {
                echo 'Exception while email storing in database: ' . $e->getMessage();
            }
        }
    }

    private static function storeMail(MailModel $mailModel)
    {
        $sql = 'INSERT INTO notifications (recipientId, recipientAddress, subject, message, sendDate, header, verifCode,
                                        isCodeUsed, notifType, messageType, isSent)
                values (?,?,?,?,?,?,?,?,?,?,?)';

        SqlDataAccess::SaveData($sql,
            [$mailModel->getRecipientId(),
                $mailModel->getRecipientAddress(),
                $mailModel->getSubject(),
                $mailModel->getMessage(),
                $mailModel->getSendDate(),
                $mailModel->getHeader(),
                $mailModel->getVerifCode(),
                $mailModel->getIsCodeUsed(),
                $mailModel->getNotifType(),
                $mailModel->getMessageType(),
                $mailModel->getIsSent()]);
    }
}


