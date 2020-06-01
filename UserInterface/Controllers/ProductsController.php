<?php


namespace UserInterface;
include "DataLibrary/BusinessLogic/ProductsProcessor.php";

use DataLibrary\ProductsProcessor;
use DataLibrary\UserProcessor;

class ProductsController extends ControllerAbstract
{
    private $checkingAccModelArr;
    private $savingsAccModelArr;
    private $consumerLoanModeArr;
    private $mortgageLoanModeArr;
    private $cardModelsArr;

    public function __construct(ViewAbstract $view, $checkAccModelArr, $savingsAccModelArr, $cardModelsArr, $consumerLoanModeArr, $mortgageLoanModeArr)
    {
        parent::__construct($view, null);
        $this->checkingAccModelArr = $checkAccModelArr;
        $this->savingsAccModelArr = $savingsAccModelArr;
        $this->cardModelsArr = $cardModelsArr;
        $this->consumerLoanModeArr = $consumerLoanModeArr;
        $this->mortgageLoanModeArr = $mortgageLoanModeArr;
    }

    public function showAllProducts()
    {
        self::populateModels();
        $this->view->echoBody();
    }

    protected function populateModels()
    {
        $user = $this->getUserFromSession();

        $this->populateCheckingAccounts($user->getUserId());
        $this->populateSavingAccounts($user->getUserId());
        $this->populateCards($user->getUserId());
        $this->populateLoans($user->getUserId());

    }

    private function getUserFromSession()
    {
        $userToken = isset($_SESSION['userToken']) ? $_SESSION['userToken'] : null;
        $user = UserProcessor::getUserByToken($userToken);
        if ($user == UserProcessor::returnNullUser()) {
            exit();
        }
        return $user;
    }

    /**
     * @param $userId
     */
    private function populateCheckingAccounts($userId)
    {
        $userAccounts = ProductsProcessor::getUserAccountsByType($userId, "CHKA");

        foreach ($userAccounts as $userAccount) {
            $account = new AccountModel();
            $account->setAccountName($userAccount['productname'] . " ****" . substr($userAccount['aNumber'], 22, 4));
            $account->setAvailFunds($userAccount['availFunds']);
            $account->setBalance($userAccount['balance']);
            $account->setAccountNumber($userAccount['aNumber']);
            $this->checkingAccModelArr->addElement($account);
        }
    }

    /**
     * @param $userId
     */
    private function populateSavingAccounts($userId)
    {
        $userAccounts = ProductsProcessor::getUserAccountsByType($userId, "SVGA");

        foreach ($userAccounts as $userAccount) {
            $account = new AccountModel();
            $account->setAccountName($userAccount['productname'] . " ****" . substr($userAccount['aNumber'], 22, 4));
            $account->setAvailFunds($userAccount['availFunds']);
            $account->setBalance($userAccount['balance']);
            $account->setAccountNumber($userAccount['aNumber']);
            $this->savingsAccModelArr->addElement($account);
        }
    }

    /**
     * @param $userId
     */
    private function populateCards($userId)
    {
        $userCards = ProductsProcessor::getUserCardsByType($userId, "%");

        foreach ($userCards as $userCard) {
            $card = new CardModel();
            $card->setCardName($userCard['productname'] . " ****" . substr($userCard['cNumber'], 12, 4));
            $card->setValidThru($userCard['validThru']);
            $card->setAccountDisplayInfo($userCard['linkedAccName'] . ' *****' . substr($userCard['linkedAccNumber'], 22, 4));
            $this->cardModelsArr->addElement($card);
        }
    }

    /**
     * @param $userId
     */
    private function populateLoans($userId)
    {
        $consumerLoans = ProductsProcessor::getUserLoansByType($userId, "");

        foreach ($consumerLoans as $userLoan) {
            $account = new LoanModel();
            $account->setLoanName($userLoan['productname']);
            $account->setAmount($userLoan['amount']);
            $account->setInstallments($userLoan['installments']);
            $account->setInterestRate($userLoan['interestRate']);
            $this->consumerLoanModeArr->addElement($account);
        }

        $mortgageLoans = ProductsProcessor::getUserLoansByType($userId, "");

        foreach ($mortgageLoans as $userLoan) {
            $account = new LoanModel();
            $account->setAccountName($userLoan['productname'] . " ****" . substr($userLoan['aNumber'], 22, 4));
            $account->setAvailFunds($userLoan['availFunds']);
            $account->setBalance($userLoan['balance']);
            $account->setAccountNumber($userLoan['aNumber']);
            $this->mortgageLoanModeArr->addElement($account);
        }
    }

    public function showSavingsProducts()
    {
        $user = $this->getUserFromSession();
        self::populateSavingAccounts($user->getUserId());
        $this->view->echoBody();
    }

    public function showCardProducts()
    {
        $user = $this->getUserFromSession();
        self::populateCards($user->getUserId());
        $this->view->echoBody();
    }

    public function showLoanProducts()
    {
        $user = $this->getUserFromSession();
        self::populateLoans($user->getUserId());
        $this->view->echoBody();
    }
}