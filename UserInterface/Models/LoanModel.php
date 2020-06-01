<?php


namespace UserInterface;


class LoanModel
{

    protected $amount;
    protected $loanName;
    protected $installments;
    protected $interestRate;


    /**
     * @return mixed
     */
    public function getLoanName()
    {
        return $this->loanName;
    }

    /**
     * @param mixed $loanName
     */
    public function setLoanName($loanName)
    {
        $this->loanName = $loanName;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getInstallments()
    {
        return $this->installments;
    }

    /**
     * @param mixed $installments
     */
    public function setInstallments($installments)
    {
        $this->installments = $installments;
    }

    /**
     * @return mixed
     */
    public function getInterestRate()
    {
        return $this->interestRate;
    }

    /**
     * @param mixed $interestRate
     */
    public function setInterestRate($interestRate)
    {
        $this->interestRate = $interestRate;
    }
}