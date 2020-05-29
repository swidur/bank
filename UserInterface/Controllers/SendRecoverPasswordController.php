<?php

namespace UserInterface {

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'UserInterface/Controllers/ControllerAbstract.php';
    include_once 'DataLibrary/BusinessLogic/RegisterProcessor.php';

    use DataLibrary\RegisterProcessor;

    class SendRecoverPasswordController extends ControllerAbstract
    {
        //data validation constants
        const emailMax = 255;

        function validatePOST()
        {
            $toVerify = ['email'];

            if (!isset($_POST['recoverSubmit'])) {
                $this->model->setError("");
                return 0;
            } else {
                foreach ($toVerify as $index) {
                    if (!isset($_POST[$index])) {
                        $this->model->setError("Proszę uzupełnić wymagane pola");
                        return 0;
                    }
                    if (empty($_POST[$index])) {
                        $this->model->setError("Proszę uzupełnić wymagane pola");
                        return 0;
                    }
                }
                if (strlen($_POST['email']) > self::emailMax) {
                    $this->model->setError("Wprowadzono nieprawidłową ilość znaków");
                    return 0;
                } else {
                    return 1;
                }
            }
        }

        protected function populateModels()
        {
            $this->model->setEmail(isset($_POST['email']) ? $_POST['email'] : null);
        }

        function recoverPassword()
        {
            $this->populateModels();
            if ($this->validatePOST()) {
                $recoverAttempt = RegisterProcessor::sendRecoveryMail($this->model);
                if ($recoverAttempt['return']) {
                    $this->model->setError($recoverAttempt['error']);
                    return 1;
                } else {
                    $this->model->setError($recoverAttempt['error']);
                }
            }
            $this->view->setPagePath('UserInterface/Views/Include/Html/ForgotPasswordTemplate.php');
            $this->view->echoBody();
            return 0;
        }
    }
}
