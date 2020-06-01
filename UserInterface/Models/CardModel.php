<?php


namespace UserInterface;


class CardModel
{
    protected $cardName;
    protected $cNumber;

    protected $accountName;
    protected $accountNumber;
    protected $accountDisplayInfo;


    protected $validThru;
    protected $securityCodes;
    protected $PIN;
    protected $isBlocked;


    /**
     * @return mixed
     */
    public function getAccountDisplayInfo()
    {
        return $this->accountDisplayInfo;
    }

    /**
     * @param mixed $accountDisplayInfo
     */
    public function setAccountDisplayInfo($accountDisplayInfo)
    {
        $this->accountDisplayInfo = $accountDisplayInfo;
    }

    /**
     * @return mixed
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * @param mixed $cardName
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
    }


    /**
     * @return mixed
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param mixed $accountName
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;
    }

    /**
     * @return mixed
     */
    public function getCNumber()
    {
        return $this->cNumber;
    }

    /**
     * @param mixed $cNumber
     */
    public function setCNumber($cNumber)
    {
        $this->cNumber = $cNumber;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param mixed $accountNumber
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return mixed
     */
    public function getValidThru()
    {
        return $this->validThru;
    }

    /**
     * @param mixed $validThru
     */
    public function setValidThru($validThru)
    {
        $validThru = date('y/m', strtotime($validThru));
        $this->validThru = $validThru;
    }

    /**
     * @return mixed
     */
    public function getSecurityCodes()
    {
        return $this->securityCodes;
    }

    /**
     * @param mixed $securityCodes
     */
    public function setSecurityCodes($securityCodes)
    {
        $this->securityCodes = $securityCodes;
    }

    /**
     * @return mixed
     */
    public function getPIN()
    {
        return $this->PIN;
    }

    /**
     * @param mixed $PIN
     */
    public function setPIN($PIN)
    {
        $this->PIN = $PIN;
    }

    /**
     * @return mixed
     */
    public function getIsBlocked()
    {
        return $this->isBlocked;
    }

    /**
     * @param mixed $isBlocked
     */
    public function setIsBlocked($isBlocked)
    {
        $this->isBlocked = $isBlocked;
    }

}