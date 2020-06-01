<?php


namespace UserInterface;


class ProductsView extends ViewAbstract
{
    private $checkingModelsArr;
    private $savingsModelsArr;
    private $cardModelsArr;
    private $consumerLoanModelsArr;
    private $mortgageLoanModelsArr;

    public function __construct($checkingModelsArr, $savingsAccModelArr, $cardModelsArr, $consumerLoanModelsArr, $mortgageLoanModelsArr)
    {
        parent::__construct(null);
        $this->checkingModelsArr = $checkingModelsArr;
        $this->savingsModelsArr = $savingsAccModelArr;
        $this->cardModelsArr = $cardModelsArr;
        $this->consumerLoanModelsArr = $consumerLoanModelsArr;
        $this->mortgageLoanModelsArr = $mortgageLoanModelsArr;
    }

    public function echoBody()
    {
        include $this->pagePath;
        include 'UserInterface/Views/Include/Html/Footer.php';
    }


    /**
     * @return mixed
     */
    public function getCheckingModelsArr()
    {
        return $this->checkingModelsArr;
    }

    /**
     * @param mixed $checkingModelsArr
     */
    public function setCheckingModelsArr($checkingModelsArr)
    {
        $this->checkingModelsArr = $checkingModelsArr;
    }
}