<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Logowanie</title>

    <!-- Custom fonts for this template-->
    <!--    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="UserInterface/Views/Include/Css/sb-admin-2.css" rel="stylesheet">

    <!-- Skrypt validujący pola formularza    -->


</head>

<body class="padded">
<!-- Fixes firefox FOUC rendering error, dont delete or move -->
<script>0</script>
<!-- end -->

<div class="container">
    <h2 class="mt-4 mb-3">Logowanie
        <!--      <small>Subheading</small>-->
    </h2>
    <!--     Page Heading/Breadcrumbs -->
    <!--    <ol class="breadcrumb">-->
    <!--        <li class="breadcrumb-item">-->
    <!--            <a href="/gr4/">Home</a>-->
    <!--        </li>-->
    <!--        <li class="breadcrumb-item active">Logowanie</li>-->
    <!--    </ol>-->
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Witaj ponownie!</h1>
                                </div>
                                <form class="user" action="/gr4/login" name="login" method="POST">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email"
                                               aria-describedby="emailHelp" autocomplete="off" placeholder="Adres email"
                                               value="<?php echo $this->model->getEmail() ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                               autocomplete="off" placeholder="Hasło">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" type="submit" name="loginSubmit">
                                        Zaloguj
                                    </button>

                                </form>
                                <hr>
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
                                    <a class="small" href="/gr4/register">Zarejestruj się!</a>
                                </div>
                            </div>
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
<script src="js/sb-admin-2.min.js"></script>

<!-- JQuery and validation -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="UserInterface/Views/Include/JavaScript/login-validation.js"></script>
</body>

</html>
