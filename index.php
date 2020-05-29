<?php

use DataLibrary\Helpers;
use DataLibrary\UserProcessor;

set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);


// load and initialize any global libraries
require_once 'UserInterface/Models/UserModel.php';
require_once 'Controllers.php';
require_once 'vendor/autoload.php';

$test = ['home', 'login'];

$uri = strtolower(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$isLoggedIn = Helpers::isUserLoggedIn();


switch ($isLoggedIn) {
//  Actions of logged IN user:
    case true:
        switch ($uri) {
            case '/gr4/dashboard':
                dashboard();
                break;
            case '/gr4/dashboard/foreigntransfer':
                transfers('foreign');
                break;
            case '/gr4/dashboard/selftransfer':
                transfers('self');
                break;
            case '/gr4/dashboard/history':
                history();
                break;
            case '/gr4/logout':
                logout('normal');
                break;
            case '/gr4/inactivity':
                logout('inactivity');
                break;
            case '/gr4/renewsession':
                $_SESSION['timeout'] = time();
                break;
            case '/gr4/getusers': //DEV usunąć!
                UserProcessor::getUsers();
                break;

            default:
                Helpers::redirect('/gr4/dashboard');

        }
        break; //case true break

//  Actions of logged OUT user:
    case false:
        switch ($uri) {
            case '/gr4':
            case '/gr4/':
            case '/gr4/home':
            case '/gr4/index':
                goHome();
                break;
            case '/gr4/login':
                login();
                break;
            case '/gr4/register':
                register();
                break;
            case '/gr4/registerdetails':
                registerDetails();
                break;
            case '/gr4/forgotpassword':
                forgotPassword();
                break;
            case '/gr4/verify':
                verifyEmail();
                break;
            case '/gr4/changepassword':
                changepassword();
                break;
            case '/gr4/redirect/passwordchange':
                redirect('passwordChange');
                break;
            case '/gr4/redirect/registered':
                redirect('registered');
                break;
            case '/gr4/redirect/registereddetails':
                redirect('registereddetails');
                break;
            case '/gr4/redirect/passwordreset':
                redirect('passwordreset');
                break;
            case '/gr4/redirect/verification':
                redirect('verification');
                break;
            case '/gr4/redirect/inactivitylogout':
                redirect('inactivitylogout');
                break;
            case '/gr4/redirect/loggedout':
                redirect('loggedout');
                break;
            case '/gr4/contact':
                staticPage('contact');
                break;
            case '/gr4/error/404':
                staticPage('404');
                break;
            default:
//               header("Location:  /gr4/");
                Helpers::redirect('/gr4/');
        }

        break; //case false break

    default:
        staticPage('404');
}
//
//if ('/gr4/index' === $uri) {
//    goHome();
//}
//elseif ('/gr4/login' === $uri && !(Helpers::isUserLoggedIn())){
//    login();
//}
//elseif ('/gr4/logout' === $uri){
//    logout();
//}
//elseif ('/gr4/register' === $uri){
//    register();
//}
//elseif('/gr4/verify' === $uri){
//    verifyEmail();
//}
//elseif ('/gr4/forgotpassword' === $uri) {
//    forgotPassword();
//}
//elseif ('/gr4/changepassword' === $uri) {
//    changePassword();
//}
//elseif ('/gr4/redirect/registered' === $uri) {
//    redirect('registered');
//
//}elseif ('/gr4/redirect/passwordreset' === $uri) {
//    redirect('passwordreset');
//
//}elseif ('/gr4/contact' === $uri) {
//    staticPage('contact');
//}
//else {
//    Helpers::redirect('/gr4/');
////    header('HTTP/1.1 404 Not Found');
////    echo '<html><body><h1>Page- Not Found</h1></body></html>';
//}
