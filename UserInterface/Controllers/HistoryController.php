<?php


namespace UserInterface;


class HistoryController extends ControllerAbstract
{
    protected $historyFilterModel;
    protected $accountModel;

    public function __construct(ViewAbstract $view, UserModel $userModel, $historyFilterModel, $accountModel)
    {
        parent::__construct($view, $userModel);
        $this->historyFilterModel = $historyFilterModel;
        $this->historyFilterModel = $accountModel;
    }

    protected function validatePOST()
    {

        if (!isset($_POST['historySubmit'])) {
            return 0;
        } else return 1;
    }


    protected function populateModels()
    {

    }

    public function displayHistory()
    {

    }
}