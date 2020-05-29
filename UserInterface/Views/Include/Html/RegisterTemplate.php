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


</head>

<!--<body class="bg-gradient-primary">-->
<body class="padded">

<!-- Fixes firefox FOUC rendering error, dont delete or move -->
<script>0</script>
<!-- end -->
<div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h2 class="mt-4 mb-3">Rejestracja
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
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Załóż konto!</h1>
                        </div>
                        <form class="user" name="registration" method="POST" action="/gr4/register">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="firstName"
                                           placeholder="Imię" value="<?php echo $this->model->getFirstName() ?>"
                                           autocomplete="off">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="secondName"
                                           placeholder="Drugie imię" value="<?php echo $this->model->getSecondName() ?>"
                                           autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="lastName"
                                       placeholder="Nazwisko" value="<?php echo $this->model->getLastName() ?>"
                                       autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="email" name="email"
                                       placeholder="Adres Email" value="<?php echo $this->model->getConfirmEmail() ?>"
                                       autocomplete="off">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="confirmEmail"
                                       name="confirmEmail" placeholder="Powtórz adres Email"
                                       value="<?php echo $this->model->getConfirmEmail() ?>" autocomplete="off">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password"
                                           name="password" placeholder="Hasło">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="confirmPassword"
                                           name="confirmPassword" placeholder="Powtórz hasło">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-user btn-block" type="submit" name="registerSubmit">
                                Zarejestruj!
                            </button>

                        </form>
                        <hr>
                        <!-- Show danger card if field was validated with error by server -->
                        <?php if (!empty($this->model->getError())): ?>
                            <div class="card mb-2 py-1 border-left-danger small">
                                <div class="card-body">
                                    <?php echo $this->model->getError() ?>
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

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script type="text/javascript" src="UserInterface/Views/Include/JavaScript/sb-admin-2.js"></script>
<!-- JQuery and validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="UserInterface/Views/Include/JavaScript/register-validation.js"></script>
</body>

</html>
