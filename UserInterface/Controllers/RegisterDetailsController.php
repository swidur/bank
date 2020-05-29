<?php

namespace UserInterface;

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

set_include_path($_SERVER["DOCUMENT_ROOT"]);
include_once 'UserInterface/Controllers/ControllerAbstract.php';
include_once 'DataLibrary/BusinessLogic/RegisterProcessor.php';
include_once 'DataLibrary/BusinessLogic/IdDocumentProcessor.php';
include_once 'DataLibrary/BusinessLogic/AddressProcessor.php';
include_once 'DataLibrary/BusinessLogic/Helpers.php';

use DataLibrary\AddressProcessor;
use DataLibrary\Helpers;
use DataLibrary\IdDocumentProcessor;
use DataLibrary\RegisterProcessor;
use DataLibrary\UserProcessor;
use Exception;
use function Sodium\add;

class RegisterDetailsController extends ControllerAbstract
{
    //data validation constants
    const nameMax = 30;
    const streetNameMax = 50;
    const numberMax = 5;
    const areaMax = 10;
    const seriesMax = 5;
    const docNumberMax = 14;
    const issuerNameMax = 100;
    protected $addressModel;
    protected $idDocumentModel;
    protected $userModel;

    public function __construct(ViewAbstract $view, UserModel $model, AddressModel $addressModel, IdDocumentModel $idDocumentModel)
    {
        parent::__construct($view, $model);
        $this->addressModel = $addressModel;
        $this->idDocumentModel = $idDocumentModel;
        $this->userModel = $this->model;
    }


    protected function validatePOST()
    {
        $address = ['countryName', 'areaCode', 'cityName', 'houseNumber']; //not required: streetName, flatNumber
        $document = ['docType', 'docSeries', 'docNumber', 'issuerName', 'validDate'];
        $personal = ['phoneNumber', 'birthDate', 'sex']; //not required PESEL

        $allFields = array_merge($address, $document, $personal);

        if (!isset($_POST['registerDetailsSubmit'])) {
            $this->model->setError(null);
            return 0;
        } else {
            foreach ($allFields as $index) {
                if (!isset($_POST[$index])) {
                    $this->model->setError("Proszę uzupełnić wymagane pola: " . $index);
                    return 0;
                } elseif (empty($_POST[$index])) {
                    $this->model->setError("Proszę uzupełnić wymagane pola: " . $index);
                    return 0;
                }
            }
            if (strlen($_POST['countryName']) > self::nameMax or strlen($_POST['areaCode']) > self::areaMax or
                strlen($_POST['cityName']) > self::nameMax or strlen($_POST['streetName']) > self::streetNameMax or
                strlen($_POST['houseNumber']) > self::numberMax or strlen($_POST['flatNumber']) > self::numberMax or
                strlen($_POST['docSeries']) > self::seriesMax or strlen($_POST['docNumber']) > self::docNumberMax or
                strlen($_POST['issuerName']) > self::issuerNameMax) {
                $this->model->setError("Wprowadzono nieprawidłową wartość");
                return 0;
            } else return 1;
        }
    }


    protected function populateModels()
    {

//        address model ['countryName', 'areaCode', 'cityName', 'houseNumber']; //not required: streetName, flatNumber
        $this->addressModel->setCountryName(isset($_POST['countryName']) ? $_POST['countryName'] : null);
        $this->addressModel->setAreaCode(isset($_POST['areaCode']) ? $_POST['areaCode'] : null);
        $this->addressModel->setCityName(isset($_POST['cityName']) ? $_POST['cityName'] : null);
        $this->addressModel->setHouseNumber(isset($_POST['houseNumber']) ? $_POST['houseNumber'] : null);
        $this->addressModel->setStreetName(isset($_POST['streetName']) ? $_POST['streetName'] : null);
        $this->addressModel->setFlatNumber(isset($_POST['flatNumber']) ? $_POST['flatNumber'] : null);

//        iddocumentModel ['docType', 'docSeries', 'docNumber', 'issuerName', 'validDate'];
        $this->idDocumentModel->setDocType(isset($_POST['docType']) ? $_POST['docType'] : null);
        $this->idDocumentModel->setDocSeries(isset($_POST['docSeries']) ? $_POST['docSeries'] : null);
        $this->idDocumentModel->setDocNumber(isset($_POST['docNumber']) ? $_POST['docNumber'] : null);
        $this->idDocumentModel->setIssuerName(isset($_POST['issuerName']) ? $_POST['issuerName'] : null);
        $this->idDocumentModel->setValidDate(isset($_POST['validDate']) ? $_POST['validDate'] : null);

//        user model ['phoneNumber', 'birthDate', 'sex', 'PESEL'];
        $this->userModel->setPhoneNumber(isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : null);
        $this->userModel->setBirthDate(isset($_POST['birthDate']) ? $_POST['birthDate'] : null);
        $this->userModel->setSex(isset($_POST['sex']) ? $_POST['sex'] : null);
        $this->userModel->setPESEL(isset($_POST['PESEL']) ? $_POST['PESEL'] : null);


    }

    function registerDetails()
    {

        $this->populateModels();
        if ($this->validatePOST() && isset($_SESSION['token'])) {
            try {
                $userDetailsAttempt = 0;
                $userIdAttempt = 0;
                $userAddressAttempt = 0;

                $token = htmlspecialchars($_SESSION['token'], ENT_QUOTES, 'UTF-8');
                $existingUser = UserProcessor::getUserByToken($token);

                if ($existingUser != UserProcessor::returnNullUser()) {
                    $userDetailsAttempt = UserProcessor::updateUserDetails($existingUser->getUserId(), $this->userModel);
                    $userIdAttempt = IdDocumentProcessor::createIdDocument($existingUser->getUserId(), $this->idDocumentModel);
                    $userAddressAttempt = AddressProcessor::createUserAddress($existingUser->getUserId(), $this->addressModel);
                }
                if ($userDetailsAttempt && $userIdAttempt && $userAddressAttempt) {
                    UserProcessor::updateUserStatus('B', $existingUser->getUserId());
                    Helpers::redirect('/gr4/redirect/registeredDetails?success&r=30');
                    Helpers::unsetFromSession('token');
                    die();
                } else {
                    echo $userDetailsAttempt . " " . $userIdAttempt . " " . $userAddressAttempt;
                    $this->model->setError('Nie udało sie dodać danych, spróbuj ponownie później');
                }
            } catch (Exception $e) {
                Helpers::redirect('/gr4/redirect/registered?failure&r=30');
                die();
            }
        }

        $this->view->setPagePath('UserInterface/Views/Include/Html/RegisterDetailsTemplate.php');
        $this->view->echoBody();
    }
}
