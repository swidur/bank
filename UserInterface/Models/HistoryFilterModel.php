<?php


namespace UserInterface;


class HistoryFilterModel
{
    protected $accountNumber;
    protected $sinceDate;
    protected $tillDate;
    protected $fromAmt;
    protected $toAmt;

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
    public function getSinceDate()
    {
        return $this->sinceDate;
    }

    /**
     * @param mixed $sinceDate
     */
    public function setSinceDate($sinceDate)
    {
        $this->sinceDate = $sinceDate;
    }

    /**
     * @return mixed
     */
    public function getTillDate()
    {
        return $this->tillDate;
    }

    /**
     * @param mixed $tillDate
     */
    public function setTillDate($tillDate)
    {
        $this->tillDate = $tillDate;
    }

    /**
     * @return mixed
     */
    public function getFromAmt()
    {
        return $this->fromAmt;
    }

    /**
     * @param mixed $fromAmt
     */
    public function setFromAmt($fromAmt)
    {
        $this->fromAmt = $fromAmt;
    }

    /**
     * @return mixed
     */
    public function getToAmt()
    {
        return $this->toAmt;
    }

    /**
     * @param mixed $toAmt
     */
    public function setToAmt($toAmt)
    {
        $this->toAmt = $toAmt;
    }

}