<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rejestracja</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <!--    <link href="css/sb-admin-2.min.css" rel="stylesheet">-->
    <link href="UserInterface/Views/Include/Css/sb-admin-2.css" rel="stylesheet">
    <!--    multistep form import-->
    <link href="UserInterface/Views/Include/Css/multistep.css" rel="stylesheet">


</head>

<!--<body class="bg-gradient-primary">-->
<body class="padded">

<!-- Fixes firefox FOUC rendering error, dont delete or move -->
<script>0</script>
<!-- end -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h2 class="mt-4 mb-3">Potrzebujemy Twoich danych
        <!--      <small>Subheading</small>-->
    </h2>

    <!--    <ol class="breadcrumb">-->
    <!--        <li class="breadcrumb-item">-->
    <!--            <a href="/gr4/">Home</a>-->
    <!--        </li>-->
    <!--        <li class="breadcrumb-item active">Rejestracja</li>-->
    <!--    </ol>-->

    <div class="card o-hidden border-0 shadow-lg">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="py-5">


                        <div class="multisteps-form">
                            <!--progress bar-->
                            <div class="row">
                                <div class="col-12 col-lg-12 ml-auto mr-auto mb-4">
                                    <div class="multisteps-form__progress">
                                        <button class="multisteps-form__progress-btn js-active" type="button"
                                                title="User Info">Dane adresowe
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Address">
                                            Dokument tożsamości
                                        </button>
                                        <button class="multisteps-form__progress-btn" type="button" title="Order Info">
                                            Dane osobowe
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!--form panels-->
                            <div class="row">
                                <div class="col-8 col-lg-10 m-auto">
                                    <form class="multisteps-form__form user" name="registerDetails" method="POST"
                                          action="/gr4/registerDetails">
                                        <!--single form panel-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active"
                                             data-animation="scaleIn">
                                            <h4 class="multisteps-form__title"></h4>
                                            <div class="multisteps-form__content">
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="countryName" placeholder="Kraj"
                                                               value="<?php echo $this->addressModel->getCountryName() ?>"/
                                                        >
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="areaCode" placeholder="Kod pocztowy"
                                                               value="<?php echo $this->addressModel->getAreaCode() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control form-control-user "
                                                               type="text" name="cityName" placeholder="Miasto"
                                                               value="<?php echo $this->addressModel->getCityName() ?>"/>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="streetName" placeholder="Ulica"
                                                               value="<?php echo $this->addressModel->getStreetName() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="houseNumber" placeholder="Numer domu"
                                                               value="<?php echo $this->addressModel->getHouseNumber() ?>"/>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="flatNumber"
                                                               placeholder="Numer mieszkania"
                                                               value="<?php echo $this->addressModel->getFlatNumber() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                            title="Next">Dalej
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                             data-animation="scaleIn">
                                            <h4 class="multisteps-form__title"></h4>
                                            <div class="multisteps-form__content">
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0 ">
                                                        <input class="form-check-label ml-4" type="radio"
                                                               id='personalId' name="docType" value="personalId"/>
                                                        <label class="form-check-label" for="personalId">
                                                            Dowód osobisty
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="form-check-label ml-4" type="radio" id='passport'
                                                               name="docType" value="passport"/>
                                                        <label class="form-check-label" for="passport">
                                                            Paszport
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control form-control-user "
                                                        ="text" name="docSeries" placeholder="Seria" value=
                                                        "<?php echo $this->idDocumentModel->getDocSeries() ?>"/>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="docNumber" placeholder="Numer"
                                                               value="<?php echo $this->idDocumentModel->getDocNumber() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="issuerName" placeholder="Wystawca"
                                                               value="<?php echo $this->idDocumentModel->getIssuerName() ?>"/>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user dateclass placeholderclass"
                                                               data-tip="Ważny do:"
                                                               type="date" name="validDate" placeholder="Ważny do"
                                                               onClick="$(this).removeClass('placeholderclass')"
                                                               value="<?php echo $this->idDocumentModel->getValidDate() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button"
                                                            title="Prev">Cofnij
                                                    </button>
                                                    <button class="btn btn-primary ml-auto js-btn-next" type="button"
                                                            title="Next">Dalej
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <!--single form panel-->
                                        <div class="multisteps-form__panel shadow p-4 rounded bg-white"
                                             data-animation="scaleIn">
                                            <h4 class="multisteps-form__title"></h4>
                                            <div class="multisteps-form__content">
                                                <div class="form-row mt-4">
                                                    <div class="col-12 col-sm-6">
                                                        <input class="multisteps-form__input form-control form-control-user "
                                                               type="text" name="PESEL" placeholder="PESEL"
                                                               value="<?php echo $this->model->getPESEL() ?>"/>
                                                    </div>
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user"
                                                               type="text" name="phoneNumber"
                                                               placeholder="Numer telefonu"
                                                               value="<?php echo $this->model->getPhoneNumber() ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-row mt-lg-4 mt-md-4 mt-sm-4">
                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <input class="multisteps-form__input form-control form-control-user dateclass placeholderclass"
                                                               type="date" name="birthDate" title="Data urodzenia"
                                                               placeholder="Data urodzenia"
                                                               onClick="$(this).removeClass('placeholderclass')"
                                                               value="<?php echo $this->model->getBirthDate() ?>"/>
                                                    </div>

                                                    <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                                                        <select class="form-control selectWrapper" name="sex" id="sex">
                                                            <option class="selectBox" value="sex" disabled selected
                                                                    hidden>Płeć
                                                            </option>
                                                            <option class="selectBox" value="male">Mężczyzna</option>
                                                            <option class="selectBox" value="female">Kobieta</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="button-row d-flex mt-4">
                                                    <button class="btn btn-primary js-btn-prev" type="button"
                                                            title="Prev">Cofnij
                                                    </button>
                                                    <button class="btn btn-success ml-auto" type="submit"
                                                            name="registerDetailsSubmit" onclick="" title="Send">Wyślij
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <hr>
                        <!-- Show danger card if field was validated with error by server -->
                        <?php if (!empty($this->model->getError())): ?>

                            <div class="container">
                                <div class="col-10">
                                    <div class="card mb-2 ml-4 py-1 border-left-danger small">
                                        <div class="card-body">
                                            <?php echo $this->model->getError() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="text-center">
                            <a class="small" href="/gr4/forgotPassword">Zapomniałeś hasła?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="/gr4/login">Masz już konto? Zaloguj się!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Latest compiled and minified JavaScript -->

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script type="text/javascript" src="UserInterface/Views/Include/JavaScript/sb-admin-2.js"></script>
<!-- JQuery and validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script src="UserInterface/Views/Include/JavaScript/register-validation.js"></script>
<script src="UserInterface/Views/Include/JavaScript/multistep.js"></script>

</body>

</html>
