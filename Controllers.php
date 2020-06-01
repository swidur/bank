<?php

use DataLibrary\Helpers;
use DataLibrary\RegisterProcessor;
use DataLibrary\UserProcessor;
use UserInterface\AddressModel;
use UserInterface\ChangePasswordController;
use UserInterface\IdDocumentModel;
use UserInterface\ListWrapper;
use UserInterface\LoginController;
use UserInterface\ProductsController;
use UserInterface\ProductsView;
use UserInterface\RedirectPageModel;
use UserInterface\RedirectPageView;
use UserInterface\RegisterController;
use UserInterface\RegisterDetailsController;
use UserInterface\RegisterDetailsView;
use UserInterface\SendRecoverPasswordController;
use UserInterface\UserModel;
use UserInterface\WithFootView;
use UserInterface\WithNavFootView;

require_once 'UserInterface/Models/RedirectPageModel.php';
require_once 'UserInterface/Models/UserModel.php';
require_once 'UserInterface/Models/AddressModel.php';
require_once 'UserInterface/Models/IdDocumentModel.php';
require_once 'UserInterface/Models/AccountModel.php';
require_once 'UserInterface/Models/CardModel.php';
require_once 'UserInterface/Models/ListWrapper.php';

require_once 'UserInterface/Controllers/RegisterController.php';
require_once 'UserInterface/Controllers/RegisterDetailsController.php';
require_once 'UserInterface/Controllers/SendRecoverPasswordController.php';
require_once 'UserInterface/Controllers/LoginController.php';
require_once 'UserInterface/Controllers/ChangePasswordController.php';
require_once 'UserInterface/Controllers/ProductsController.php';

require_once 'DataLibrary/BusinessLogic/RegisterProcessor.php';
require_once 'DataLibrary/BusinessLogic/UserProcessor.php';
require_once 'DataLibrary/BusinessLogic/Helpers.php';


require_once 'UserInterface/Views/RedirectPageView.php';
require_once 'UserInterface/Views/WithFootView.php';
require_once 'UserInterface/Views/WithNavFootView.php';
require_once 'UserInterface/Views/RegisterDetailsView.php';
require_once 'UserInterface/Views/ProductsView.php';


function goHome()
{
    $home = new WithNavFootView(new UserModel());
    $home->setPagePath('UserInterface/Views/Include/Html/HomeTemplate.php');
    $home->echoBody();
}


function register()
{
    $model = new UserModel();
    $controller = new RegisterController(new WithNavFootView($model), $model);
    $registerStatus = $controller->registerUser();
    $registerStatus ? redirect('/gr4/dashboard') : null;
}

//DEV do prototypowania usunac w produkcji
function registerDetails()
{
    $model = new UserModel();
    $addressModel = new AddressModel();
    $idDocModel = new IdDocumentModel();
    $controller = new RegisterDetailsController(new RegisterDetailsView($model, $addressModel, $idDocModel), $model, $addressModel, $idDocModel);
    $loginStatus = $controller->registerDetails();

}


function verifyEmail()
{
    if (isset($_GET['guid'])) {
        $userToken = isset($_GET['id']) ? $_GET['id'] : null;
        $guid = isset($_GET['guid']) ? $_GET['guid'] : null;
        $isVerified = RegisterProcessor::verifyRegistrationEmail($guid, $userToken);
        if ($isVerified) {
//            Helpers::redirect('/gr4/redirect/verification?success&r=30');
            Helpers::addToSession("token", $userToken);
            Helpers::redirect('/gr4/registerDetails');
            die();
        } else {
            Helpers::redirect('/gr4/redirect/verification?failure&r=30');
            die();
        }
    }
}

function login()
{
    $model = new UserModel();
    $controller = new LoginController(new WithNavFootView($model), $model);
    $loginStatus = $controller->loginUser();
    if ($loginStatus) {
        Helpers::redirect('/gr4/dashboard');
        die();
    }
}

function logout($type)
{
    session_start();
    session_destroy();
    if ($type === 'normal') {
        $_GET['r'] = '30';
        redirect('loggedout');
    } elseif ($type == 'inactivity') {
        $_GET['r'] = '30';
        redirect('inactivitylogout');
    }
}


function forgotPassword()
{
    if (isset($_GET['guid']) && isset($_GET['id'])) {
        $codeToVerify = $_GET['guid'];
        $userToken = $_GET['id'];
        $existingUser = UserProcessor::getUserByToken($userToken);
        $isVerified = RegisterProcessor::verifyRecoveryLink($codeToVerify, $existingUser->getUserId());
        if (!$isVerified) {
            Helpers::redirect('/gr4/redirect/passwordreset?failure');
            die();
        } else {
            $model = new UserModel();
            session_start();
            $_SESSION['id'] = $existingUser->getUserId();
            session_write_close();
            $controller = new ChangePasswordController(new WithNavFootView($model), $model);
            $controller->changePassword($existingUser->getUserId());
        }
    } else {
        $model = new UserModel();
        $controller = new SendRecoverPasswordController(new WithNavFootView($model), $model);
        $isSent = $controller->recoverPassword();
        $isSent ? Helpers::redirect('/gr4/redirect/passwordreset?success&r=30') : null;
    }
}

function changePassword()
{
    session_start();
    if (!isset($_SESSION['id'])) {
        session_write_close();
        Helpers::redirect('/gr4/');
        die();
    } else {
        $userId = $_SESSION['id'];
        $model = new UserModel();
        $controller = new ChangePasswordController(new WithNavFootView($model), $model);
        $isChanged = $controller->changePassword($userId);
        if ($isChanged) {
            session_destroy();
            Helpers::redirect('/gr4/redirect/passwordChange?success');
        }
        session_write_close();
    }
}

function redirect($pageType)
{
    $model = new RedirectPageModel();

    isset($_GET['r']) ? $redirect = $_GET['r'] : $redirect = -1;
    $model->setRedirect($redirect);

    $redirectLink = ' <br><br><a href="/gr4/">Za chwilę zostaniesz przekierowany na stronę główną</a>';

    if ($pageType == 'registered') {
        $model->setPageTitle('Rejestracja!');
        $model->setHeading('Rejestracja');
        if (isset($_GET['success'])) {
            $model->setCardTitle('Zarejestrowano!');
            $model->setMessage('Zostałeś zarejestrowany! <br> Sprawdź swoją skrzynkę mailową, przesłaliśmy na nią instrukcję dalszego postępowania.' . $redirectLink);
        } elseif (isset($_GET['failure'])) {
            $model->setCardTitle('Nie udało się!');
            $model->setMessage('Niestety nie zostałeś zarejestrowany. <br>Spróbuj ponownie później lub <a href="/gr4/contact">skontaktuj się z nami</a>' . $redirectLink);
        }
    } elseif ($pageType == 'registereddetails') {
        $model->setPageTitle('Rejestracja!');
        $model->setHeading('Rejestracja');
        if (isset($_GET['failure'])) {
            $model->setCardTitle('Nie udało się!');
            $model->setMessage('Coś poszło nie tak.<br>Spróbuj ponownie później lub <a href="/gr4/contact">skontaktuj się z nami</a>' . $redirectLink);
        } elseif (isset($_GET['success'])) {
            $model->setCardTitle('Dziękujemy za rejestrację!');
            $model->setMessage('Proces rejestracji dobiegł niemal końca. Poczekaj na decyzję pracownika Banku o otwarciu Twojego konta. <br>
                                O decyzji zostaniesz powiadomiony osobną wiadomością' . $redirectLink);
        } else {
            Helpers::redirect('/gr4/');
            die();
        }
    } elseif ($pageType == 'passwordreset') {
        $model->setPageTitle('Resetowanie hasła');
        $model->setHeading('Resetowanie hasła');
        if (isset($_GET['failure'])) {
            $model->setCardTitle('Nie udało się!');
            $model->setMessage('Coś poszło nie tak.<br>Spróbuj ponownie później lub <a href="/gr4/contact">skontaktuj się z nami</a>' . $redirectLink);
        } elseif (isset($_GET['success'])) {
            $model->setCardTitle('Email został wysłany!');
            $model->setMessage('Wysłaliśmy do Ciebie wiadomość z instrukcją resetowania hasła' . $redirectLink);
        } else {
            Helpers::redirect('/gr4/');
            die();
        }
    } elseif ($pageType == 'passwordChange') {
        $model->setPageTitle('Zmiana hasła');
        $model->setHeading('Zmiana hasła');
        if (isset($_GET['success'])) {
            $model->setCardTitle('Hasło zostało pomyślnie zmienione!');
            $model->setMessage('Możesz się teraz zalogować swoim nowym hasłem. Postaraj się go nie zapomnieć..' . $redirectLink);
        } else {
            Helpers::redirect('/gr4/');
            die();
        }
    } elseif ($pageType == 'verification') {
        $model->setPageTitle('Weryfikacja adresu email');
        $model->setHeading('Weryfikacja adresu email');
        if (isset($_GET['failure'])) {
            $model->setCardTitle('Błąd weryfikacji!');
            $model->setMessage('Niestety nie udało się nam zweryfikować Twojego adresu email. <br>Spróbuj ponownie później lub <a href="/gr4/contact">skontaktuj się z nami</a>' . $redirectLink);
        } elseif (isset($_GET['success'])) {
            $model->setCardTitle('Zweryfikowano pomyślnie!');
            $model->setMessage('Dziękujemy za zweryfikowanie adresu email. <br>Poczekaj na zatwierdzenie Twojego konta przez pracownika banku.' . $redirectLink);
        }
    } elseif ($pageType == 'inactivitylogout') {
        $model->setPageTitle('Zostałeś wylogowany');
        $model->setHeading('Brak aktywności');
        $model->setCardTitle('Wylogowano!');
        $model->setMessage('Nastąpiło automatyczne wylogowanie z powodu braku aktywności w serwisie transakcyjnym.' . $redirectLink);
    } elseif ($pageType == 'loggedout') {
        $model->setPageTitle('Zostałeś wylogowany');
        $model->setHeading('Zakończenie sesji');
        $model->setCardTitle('Wylogowano!');
        $model->setMessage('Nastąpiło bezpieczne wylogowanie z serwisu transakcyjnego. <br>Zapraszamy ponownie! ' . $redirectLink);
    } else {
        Helpers::redirect('/gr4/errors/404');
    }
    $view = new RedirectPageView($model);
    $view->echoBody();
}

function staticPage($pageType)
{
    $view = new WithNavFootView(null);
    switch ($pageType) {
        case 'contact':
            $view->setPagePath('UserInterface/Views/Include/Html/Static/ContactStatic.php');
            break;
        case '404':
            $view->setPagePath('Errors/404.php');
            break;
    }


    $view->echoBody();
}


function dashboard()
{
    $userModel = new UserModel();
    $view = new WithFootView($userModel);
    $view->setPagePath('UserInterface/Views/Include/Html/UserDashboardTemplate.php');
    $view->echoBody();
}

function transfers($pageType)
{
    $userModel = new UserModel();
    $view = new WithFootView($userModel);
    switch ($pageType) {
        case 'foreign':
            $view->setPagePath('UserInterface/Views/Include/Html/TransfersForeignTemplate.php');
            break;
        case 'self':
            $view->setPagePath('UserInterface/Views/Include/Html/TransfersSelfTemplate.php');
            break;
        default:
            Helpers::redirect('/gr4/dashboard');
            die();
    }
    $view->echoBody();
}

function history()
{
    $userModel = new UserModel();
    $view = new WithFootView($userModel);
    $view->setPagePath('UserInterface/Views/Include/Html/HistoryTemplate.php');
    $view->echoBody();
}

function products($pageType)
{
    $listCheckingAccounts = new ListWrapper();
    $listSavingsAccounts = new ListWrapper();
    $listCards = new ListWrapper();
    $listConsumerLoans = new ListWrapper();
    $listMortgageLoans = new ListWrapper();

    $view = new ProductsView($listCheckingAccounts, $listSavingsAccounts, $listCards, $listConsumerLoans, $listMortgageLoans);
    $controller = new ProductsController($view, $listCheckingAccounts, $listSavingsAccounts, $listCards, $listConsumerLoans, $listMortgageLoans);

    switch ($pageType) {
        case 'all':
            $view->setPagePath('UserInterface/Views/Include/Html/ProductsAllTemplate.php');
            $controller->showAllProducts();
            break;
        case 'savings':
            $view->setPagePath('UserInterface/Views/Include/Html/ProductsSavingsTemplate.php');
            $controller->showSavingsProducts();
            break;
        case 'cards':
            $view->setPagePath('UserInterface/Views/Include/Html/ProductsCardsTemplate.php');
            $controller->showCardProducts();
            break;
        case 'loans':
            $view->setPagePath('UserInterface/Views/Include/Html/ProductsLoansTemplate.php');
            $controller->showLoanProducts();
            break;
    }

}
