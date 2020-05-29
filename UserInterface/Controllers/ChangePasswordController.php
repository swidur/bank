<?php

namespace UserInterface {

    ini_set('display_startup_errors', 1);
    ini_set('display_errors', 1);
    error_reporting(-1);

    set_include_path($_SERVER["DOCUMENT_ROOT"] . '/gr4/');
    include_once 'UserInterface/Controllers/ControllerAbstract.php';

    use DataLibrary\MailProcessor;
    use DataLibrary\RegisterProcessor;


    class ChangePasswordController extends ControllerAbstract
    {
        //data validation constants
        const passwordMax = 128;
        const passwordMin = 8;


        protected function validatePOST()
        {
            $toVerify = ['password', 'confirmPassword'];

            if (!isset($_POST['changePasswordSubmit'])) {
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
                if (strlen($_POST['password']) > self::passwordMax or strlen($_POST['password']) < self::passwordMin or
                    $_POST['confirmPassword'] > self::passwordMax or strlen($_POST['confirmPassword']) < self::passwordMin) {
                    $this->model->setError("Wprowadzono nieprawidłową ilość znaków");
                    return 0;
                } elseif ($_POST['confirmPassword'] != $_POST['password']) {
                    $this->model->setError("Hasła rożnią się od siebie");
                    return 0;
                } else return 1;
            }
        }

        function populateModels()
        {
            $this->model->setPassword(isset($_POST['password']) ? $_POST['password'] : null);
            $this->model->setConfirmPassword(isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null);
        }

        function changePassword($userId)
        {
            $this->populateModels();
            if ($this->validatePOST()) {

                $changeAttempt = RegisterProcessor::changePassword($this->model->getPassword(), $userId);

                if ($changeAttempt) {
                    $email = MailProcessor::getNewestEmailDetailsByUserId($userId, 2);
                    MailProcessor::updateCodeStatus(1, $email->getId());
                    $this->model->setError("Hasło zostało zmienione!");
                    return 1;
                } else {
                    $this->model->setError("Coś poszło nie tak");
                    return 0;
                }
            } else {
                $this->view->setPagePath('UserInterface/Views/Include/Html/ChangePasswordTemplate.php');
                $this->view->echoBody();
                return 0;
            }
        }
    }
}
