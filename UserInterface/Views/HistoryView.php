<?php


namespace UserInterface;


class HistoryView extends ViewAbstract
{
    private $userModel;
    private $accountModel;

    public function __construct($userModel, $accountModel)
    {
        parent::__construct($userModel);
        $this->$userModel = $userModel;
        $this->$accountModel = $accountModel;
    }

    public function echoBody()
    {
        include 'UserInterface/Views/Include/Html/HistoryTemplate.php';
        include 'UserInterface/Views/Include/Html/Footer.php';
    }
}