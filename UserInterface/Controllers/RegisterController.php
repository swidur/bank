<?php

namespace UserInterface;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

set_include_path($_SERVER["DOCUMENT_ROOT"]);
include_once 'UserInterface/Controllers/ControllerAbstract.php';
include_once 'DataLibrary/BusinessLogic/RegisterProcessor.php';
include_once 'DataLibrary/BusinessLogic/Helpers.php';

use DataLibrary\Helpers;
use DataLibrary\RegisterProcessor;
use Exception;

class RegisterController extends ControllerAbstract
{
    //data validation constants
    const firstNameMax = 50;
    const lastNameMax = 50;
    const emailMax = 255;
    const passwordMax = 128;
    const passwordMin = 8;

    protected function validatePOST()
    {
        $toVerify = ['firstName', 'lastName', 'email',
            'confirmEmail', 'password', 'confirmPassword'];

        if (!isset($_POST['registerSubmit'])) {
            $this->model->setError(null);
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
            if (strlen($_POST['firstName']) > self::firstNameMax or strlen($_POST['secondName']) > self::firstNameMax or
                strlen($_POST['lastName']) > self::lastNameMax or
                strlen($_POST['email']) > self::emailMax or strlen($_POST['confirmEmail']) > self::emailMax or
                strlen($_POST['password']) > self::passwordMax or strlen($_POST['confirmPassword']) > self::passwordMax or
                strlen($_POST['password']) < self::passwordMin or strlen($_POST['confirmPassword']) < self::passwordMin) {
                $this->model->setError("Wprowadzono nieprawidłową wartość");
                return 0;
            } elseif ($_POST['confirmPassword'] != $_POST['password']) {
                $this->model->setError("Podane hasła nie są zgodne");
                return 0;
            } elseif ($_POST['confirmEmail'] != $_POST['email']) {
                $this->model->setError("Podane adresy email nie są zgodne");
                return 0;
            } else return 1;
        }
    }


    protected function populateModels()
    {
        $this->model->setFirstName(isset($_POST['firstName']) ? $_POST['firstName'] : null);
        $this->model->setSecondName(isset($_POST['secondName']) ? $_POST['secondName'] : null);
        $this->model->setLastName(isset($_POST['lastName']) ? $_POST['lastName'] : null);
        $this->model->setEmail(isset($_POST['email']) ? $_POST['email'] : null);
        $this->model->setConfirmEmail(isset($_POST['confirmEmail']) ? $_POST['confirmEmail'] : null);
        $this->model->setPassword(isset($_POST['password']) ? $_POST['password'] : null);
        $this->model->setConfirmPassword(isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null);
    }

    function registerUser()
    {
        $this->populateModels();
        if ($this->validatePOST()) {
            try {
                $registerAttempt = RegisterProcessor::registerUser($this->model);
                if ($registerAttempt['return']) {
                    Helpers::redirect('/gr4/redirect/registered?success&r=30');
                    die();
                } else {
                    $this->model->setError($registerAttempt['error']);
                }
            } catch (Exception $e) {
                Helpers::redirect('/gr4/redirect/registered?failure&r=30');
                die();
            }
        } else {
            $this->model->setPassword(null);
            $this->model->setConfirmPassword(null);
        }
        $this->view->setPagePath('UserInterface/Views/Include/Html/RegisterTemplate.php');
        $this->view->echoBody();
    }
}
