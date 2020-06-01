<?php


namespace UserInterface;


class HistoryView extends ViewAbstract
{
    private $userModel;
    private $accountModel;

    public function __construct($userModelsArr, $accountModelsArr)
    {
        parent::__construct($userModelsArr);
        $this->$userModelsArr = $userModelsArr;
        $this->$accountModelsArr = $accountModelsArr;
    }

    public function echoBody()
    {
        include 'UserInterface/Views/Include/Html/HistoryTemplate.php';
        include 'UserInterface/Views/Include/Html/Footer.php';
    }
}