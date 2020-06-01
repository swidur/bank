<?php


namespace DataLibrary;

use Exception;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');

include_once 'DataLibrary/DataAccess/SqlDataAccess.php';
include_once 'DataLibrary/Models/MailModel.php';
include_once 'DataLibrary/Models/GUIDGenerator.php';
include_once 'DataLibrary/BusinessLogic/UserProcessor.php';


class MailProcessor
{
    public static function prepareMessage($pathToTemplate, $substitutionsArray)
    {
        $message = file_get_contents($pathToTemplate);
        foreach ($substitutionsArray as $search => $replace) {
            $message = str_ireplace('#' . $search . '#', $replace, $message);
        }
        return $message;
    }

    private static function prepareHeader($from = '<no-reply@zmyslonyBank.pl>')
    {
        $header = "";
        $header .= "From: " . $from . "\r\n";
        $header .= "Reply-To:" . $from . "\r\n";
        $header .= "MIME-Version: 1.0" . "\r\n";
        $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        return $header;
    }

    public static function returnNullMail()
    {
        return new MailModel();
    }

    static function composeMail($recipientAddress, $subject, $message, $recipientId, $guid)
    {
        $mail = new MailModel();
        $mail->setRecipientId($recipientId);
        $mail->setSubject($subject);
        $mail->setRecipientAddress($recipientAddress);
        $mail->setMessage($message);
        $mail->setSendDate(date('Y-m-d H:i:s', time()));
        $mail->setHeader(self::prepareHeader());
        $mail->setVerifCode($guid);
        $mail->setIsCodeUsed('N');
        $mail->setMessageType('M');
        return $mail;
    }

    public static function sendMail(MailModel $mailModel)
    {
        try {
            mail($mailModel->getRecipientAddress(), $mailModel->getSubject(), $mailModel->getMessage(), $mailModel->getHeader());
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    /**
     * @param $userId
     * @param $notifType
     * Allowed values:
     * V- verification, R- recovery
     * @return MailModel
     *
     */
    public static function getNewestEmailDetailsByUserId($userId, $notifType)
    {

        $sql = "SELECT id, recipientId, recipientAddress, sendDate, verifCode, isCodeUsed, notifType, header, subject
from notifications where recipientId = ? and notifType = ? and messageType = 'M'  and isCodeUsed = 'N' and isSent= 'Y' order by sendDate desc limit 1";
        $result = SqlDataAccess::loadData($sql, [$userId, $notifType]);

        if (!$result) {
            return self::returnNullMail();
        } else {
            $mail = new MailModel();
            $mail->setid($result['id']);
            $mail->setRecipientId($result['recipientId']);
//            $mail->message= $result['message']);
            $mail->setRecipientAddress($result['recipientAddress']);
            $mail->setSendDate($result['sendDate']);
            $mail->setVerifCode($result['verifCode']);
            $mail->setIsCodeUsed($result['isCodeUsed']);
            $mail->setNotifType($result['notifType']);
            $mail->setHeader($result['header']);
            $mail->setSubject($result['subject']);

            return $mail;
        }
    }

    public static function updateCodeStatus($newStatus, $notifId)
    {
        $sql = 'UPDATE notifications set isCodeUsed = ? where id = ?';
        SqlDataAccess::saveData($sql, [$newStatus, $notifId]);
    }
}

