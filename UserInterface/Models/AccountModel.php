<?php


namespace UserInterface;


class AccountModel
{
    protected $accountNumber;
    protected $accountName;
    protected $balance;
    protected $availFunds;

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
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    /**
     * @return mixed
     */
    public function getAvailFunds()
    {
        return $this->availFunds;
    }

    /**
     * @param mixed $availFunds
     */
    public function setAvailFunds($availFunds)
    {
        $this->availFunds = $availFunds;
    }
}