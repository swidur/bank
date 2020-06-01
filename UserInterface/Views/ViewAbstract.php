<?php


namespace UserInterface;
include_once 'UserInterface/Views/Include/Helpers/HtmlHelper.php';

use DataLibrary\Helpers;

abstract class ViewAbstract
{
    protected $model;
    protected $isUserLoggedIn;
    protected $pagePath;

    function __construct($modelsArr = null)
    {
        $this->model = $modelsArr;
        $this->isUserLoggedIn = Helpers::isUserLoggedIn();
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['timeout'] = time();
    }

    public function setPagePath($pagePath)
    {
        $this->pagePath = $pagePath;
    }

    abstract public function echoBody();

}
