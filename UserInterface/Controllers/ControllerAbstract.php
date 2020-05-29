<?php


namespace UserInterface;


abstract class ControllerAbstract
{
    protected $view;
    protected $model;

    function __construct(ViewAbstract $view, UserModel $model)
    {
        $this->view = $view;
        $this->model = $model;
    }

    protected abstract function populateModels();

}