<?php


namespace DataLibrary;


abstract class NotificationModelAbstract
{
    protected $id;
    protected $recipientId;
    protected $message;
    protected $recipientAddress;
    protected $sendDate;
    protected $verifCode;
    protected $isCodeUsed;
    protected $notifType;
    protected $messageType;
    protected $isSent;

//        region Getters and Setters

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getRecipientId()
    {
        return $this->recipientId;
    }

    /**
     * @param mixed $recipientId
     */
    public function setRecipientId($recipientId)
    {
        $this->recipientId = $recipientId;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getRecipientAddress()
    {
        return $this->recipientAddress;
    }

    /**
     * @param mixed $recipientAddress
     */
    public function setRecipientAddress($recipientAddress)
    {
        $this->recipientAddress = $recipientAddress;
    }

    /**
     * @return mixed
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * @param mixed $sendDate
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
    }

    /**
     * @return mixed
     */
    public function getVerifCode()
    {
        return $this->verifCode;
    }

    /**
     * @param mixed $verifCode
     */
    public function setVerifCode($verifCode)
    {
        $this->verifCode = $verifCode;
    }

    /**
     * @return mixed
     */
    public function getIsCodeUsed()
    {
        return $this->isCodeUsed;
    }

    /**
     * @param mixed $isCodeUsed
     */
    public function setIsCodeUsed($isCodeUsed)
    {
        $this->isCodeUsed = $isCodeUsed;
    }

    /**
     * @return mixed
     */
    public function getNotifType()
    {
        return $this->notifType;
    }

    /**
     * @param mixed $notifType
     * Allowed values
     * V - email verification
     * R - password reset
     * M - marketing
     */
    public function setNotifType($notifType)
    {
        $this->notifType = $notifType;
    }

    /**
     * @return mixed
     * Allowed values
     * S - SMS
     * M - eMail
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * @param mixed $messageType
     */
    public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    }

    /**
     * @return mixed
     */
    public function getIsSent()
    {
        return $this->isSent;
    }

    /**
     * @param mixed $isSent
     */
    public function setIsSent($isSent)
    {
        $this->isSent = $isSent;
    }
// endregion


}