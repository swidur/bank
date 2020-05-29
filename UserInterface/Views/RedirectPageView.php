<?php


namespace UserInterface;
include_once 'UserInterface/Models/UserModel.php';
include_once 'UserInterface/Views/Include/Helpers/HtmlHelper.php';
include_once 'UserInterface/Views/ViewAbstract.php';

include_once 'DataLibrary/BusinessLogic/Helpers.php';

use DataLibrary\Helpers;
use HtmlHelper as Html;

class RedirectPageView extends ViewAbstract
{

    public function echoBody()
    {
        include 'UserInterface/Views/Include/Html/LoggedOutNavbar.php';

        include 'UserInterface/Views/Include/Html/RedirectPageTemplate.php';

        $redirect = $this->model->getRedirect();
        if ($redirect != -1) {
            Helpers::redirect('/gr4/', $redirect);
            die();
        }

        include 'UserInterface/Views/Include/Html/Footer.php';

    }
}