<?php

namespace UserInterface {
    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'UserInterface/Models/UserModel.php';
    include_once 'UserInterface/Views/Include/Helpers/HtmlHelper.php';
    include_once 'UserInterface/Views/ViewAbstract.php';

    use DataLibrary\Helpers;
    use HtmlHelper as Html;

    class RegisterDetailsView extends ViewAbstract
    {

        protected $addressModel;
        protected $idDocumentModel;

        public function __construct($model, $addressModel, $idDocumentModel)
        {
            parent::__construct($model);
            $this->addressModel = $addressModel;
            $this->idDocumentModel = $idDocumentModel;
        }

        public function echoBody()
        {
            isset($this->pagePath) ? include $this->pagePath : null;

            include 'UserInterface/Views/Include/Html/Footer.php';
        }
    }
}