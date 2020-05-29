<?php

namespace UserInterface {

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'DataLibrary/BusinessLogic/UserProcessor.php';
    include_once 'DataLibrary/BusinessLogic/RegisterProcessor.php';

    use DataLibrary\RegisterProcessor;
    use DataLibrary\UserProcessor;

    class LoginController extends ControllerAbstract
    {
        //data validation constants
        const emailMax = 255;
        const passwordMax = 128;
        const passwordMin = 8;


        protected function validatePOST()
        {
            $toVerify = ['email', 'password'];

            if (!isset($_POST['loginSubmit'])) {
                return 0;
            } else {
                foreach ($toVerify as $index) {
                    if (!isset($_POST[$index])) {
                        $this->model->setError("Proszę uzupełnić wymagane pola");
                        return 0;
                    } elseif (empty($_POST[$index])) {
                        $this->model->setError("Proszę uzupełnić wymagane pola");
                        return 0;
                    }
                }
                if (strlen($_POST['email']) > self::emailMax or
                    strlen($_POST['password']) > self::passwordMax or
                    strlen($_POST['password']) < self::passwordMin) {
                    $this->model->setError("Wprowadzono nieprawidłową ilość znaków");
                    return 0;
                } else return 1;
            }
        }

        protected function populateModels()
        {
            $this->model->setEmail(isset($_POST['email']) ? $_POST['email'] : null);
            $this->model->setPassword(isset($_POST['password']) ? $_POST['password'] : null);
        }

        function loginUser()
        {
            $this->populateModels();
            if ($this->validatePOST()) {
                $loginAttempt = RegisterProcessor::loginUser($this->model);

                if ($loginAttempt['return']) {
                    $loggedInUser = UserProcessor::getUserByEmail($this->model->getEmail());
                    $loggedInUser->setPassword(null);
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['isUserLoggedIn'] = true;
                    $_SESSION['userToken'] = $loggedInUser->getUserToken();
                    $_SESSION['firstName'] = $loggedInUser->getFirstName();
                    $_SESSION['lastName'] = $loggedInUser->getLastName();
                    $_SESSION['timeout'] = time();
                    session_write_close();
                    return 1;
                } else {
                    $this->model->setError($loginAttempt['error']);
                }
            }
            $this->view->setPagePath('UserInterface/Views/Include/Html/LoginTemplate.php');
            $this->view->echoBody();
        }
    }
}
