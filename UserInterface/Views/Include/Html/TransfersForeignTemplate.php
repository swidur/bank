<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Brilliant Bank Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../UserInterface/Views/Include/Css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top">


<!--Page Wrapper -->
<div id="wrapper">

    <?php require_once "Components/UserSidebar.php" ?>


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require "Components/UserTopBar.php" ?>


            <!-- region Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h5 mb-0 text-gray-800">Przelewy</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Area Chart -->
                    <div class="container col-xl-8 col-lg-8">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Nowy przelew na rachunek obcy</h6>
                            </div>

                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col">
                                    <!--region Card Body -->
                                    <div class="card-body">
                                        <div class="container">
                                            <form class="transfer" action="/gr4/dashboard/foreignTransfer"
                                                  method="POST">


                                                <h1 class="h5 mb-0 text-dark my-1">Twoje dane</h1>


                                                <div class="form-group row ">
                                                    <div class="container">
                                                        <select class="browser-default custom-select">
                                                            <option selected disabled>Z rachunku:</option>
                                                            <option value="1">One - saldo</option>
                                                            <option value="2">Two - saldo</option>
                                                            <option value="3">Three- saldo</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <h1 class="h5 mb-0 text-dark my-1">Dane odbiorcy</h1>

                                                <div class="form-group row ">
                                                    <div class="container">
                                                        <input type="text" maxlength="80" minlength="3"
                                                               class="form-control form-control-user"
                                                               name="recipientName" placeholder="Nazwa" value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <div class="container">
                                                        <input type="text" maxlength="26" minlength="26"
                                                               class="form-control form-control-user"
                                                               name="recipientNumber" placeholder="Na rachunek" value=""
                                                               autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group row "
                                                ">
                                                <div class="container">
                                                    <textarea class="form-control" id="recipientAddress"
                                                              placeholder="Opcjonalnie: ulica, numer domu, kod pocztowy, miejscowość"
                                                              rows="2"></textarea>
                                                </div>
                                        </div>

                                        <div class="form-group row"
                                        ">
                                        <div class="container">
                                            <div class="form-group form-check my-0">
                                                <input type="checkbox" class="form-check-input" id="addToContacts">
                                                <label class="form-check-label" for="addToContacts">Dodaj do listy
                                                    odbiorców</label>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="h5 mb-0 text-dark my-1">Dane przelewu</h1>

                                    <div class="form-group row ">
                                        <div class="container">
                                            <input min="0.01" step="0.01" max="9999999999" type="number"
                                                   class="form-control form-control-user" name="amount"
                                                   placeholder="Kwota" value="" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group row "
                                    ">
                                    <div class="container">
                                        <textarea maxlength="140" minlength="1" class="form-control"
                                                  id="recipientAddress" placeholder="Tytułem" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <div class="container">
                                        <input type="date" id="sendDate" class="form-control form-control-user"
                                               name="recipientNumber" placeholder="Data wykonania" value=""
                                               autocomplete="off">
                                    </div>
                                </div>

                                <button class="btn btn-primary btn-user btn-block" type="submit" name="transferConfirm">
                                    Zatwierdź
                                </button>
                                </form>
                            </div>
                        </div>
                        <!--endregion Card Body-->
                    </div>
                    <div class="col-lg-2"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->
</div>
<!-- /.container-fluid -->
</div>
<!--  endregion -->


</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- region Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chcesz się wylogować?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Kliknij <i>wyloguj</i> poniżej, aby zakończyć obecną sesją</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Zaniechaj</button>
                <a class="btn btn-primary" href="/gr4/logout">Wyloguj</a>
            </div>
        </div>
    </div>
</div>
<!--endregion-->

<!-- region Activity Modal-->
<div class="modal fade" id="inactivityModal" tabindex="-1" role="dialog" aria-labelledby="inactivtyLogout"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Brak aktywności!</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Niebawem zostaniesz wylogowany!<br>
                Jeżeli chcesz wrócić do serwisu transakcyjnego naciśnij wróć.<br/>
                Możesz też się wylogować.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary button" type="button" data-dismiss="modal" onclick="goBack()">Wróć
                </button>
                <a class="btn btn-primary" href="/gr4/logout">Wyloguj</a>
            </div>
        </div>
    </div>
</div>

<script>

</script>
<!--endregion-->
<!-- Bootstrap core JavaScript-->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!--Automatic logout script-->
<script src="../UserInterface/Views/Include/JavaScript/logout.js"></script>

</body>

</html>
