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
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../UserInterface/Views/Include/Css/sb-admin-2.css" rel="stylesheet">

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
                    <h1 class="h5 mb-0 text-gray-800">Twoje produkty</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- Area Chart -->
                    <div class="container col-xl-8 col-lg-10">

                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Zestawienie kont oszczędnościowych:</h6>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <!--region Card Body -->
                                    <div class="card-body">
                                        <div class="container px-0">


                                            <!--                    region Savings Accounts-->
                                            <div class="container mb-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <h1 class="h5">Konta oszczędnościowe</h1>
                                                    </div>
                                                    <div class="col">
                                                        <a href="" class="float-right mr-5 mt-1">Załóż konto <i
                                                                    class="fas fa-chevron-down ml-1"></i></a>
                                                    </div>
                                                </div>
                                                <?php if (isset($this->savingsModelsArr) && $this->savingsModelsArr->countElements() > 0): ?>
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-lg-6 col-sm-6"><span class="small">Nazwa</span>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-2 col-sm-2"><span class="small">Dostępne środki</span>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-2 col-sm-2"><span class="small">Saldo</span>
                                                        </div>
                                                        <div class="col-xl-2 col-lg-2 col-sm-2"><span class="small">Akcje</span>
                                                        </div>
                                                    </div>
                                                    <?php foreach ($this->savingsModelsArr->getElements() as $account): ?>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-6 col-sm-6">
                                                                <a href="/gr4/dashboard/history?account=<?php echo $account->getAccountNumber() ?>"
                                                                   class="text-primary">
                                                                    <?php echo $account->getAccountName() ?>
                                                                </a>
                                                            </div>

                                                            <div class="col-xl-2 col-lg-2 col-sm-2">
                                                                <span class="text-dark">
                                                                    <?php echo $account->getAvailFunds() ?>
                                                                </span>
                                                            </div>

                                                            <div class="col-xl-2 col-lg-2 col-sm-2">
                                                                <span class="text-dark">
                                                                    <?php echo $account->getBalance() ?>
                                                                </span>
                                                            </div>

                                                            <div class="col-xl-2 col-lg-2 col-sm-2">
                                                                <span class="text-dark">
                                                                    <a href="#">
                                                                    Więcej<i class="fas fa-chevron-down ml-1"></i>
                                                                    </a>
                                                                </span>
                                                            </div>

                                                        </div>
                                                    <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <hr style="width:75%">

                                            <!--                    endregion Savings Accounts-->


                                        </div>

                                    </div>
                                    <!--endregion Card Body-->
                                </div>

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

<!--endregion-->
<!-- Bootstrap core JavaScript-->
<script src="../../vendor/jquery/jquery.min.js"></script>
<script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="../../vendor/chart.js/Chart.min.js"></script>

<!--Automatic logout script-->
<script src="../../UserInterface/Views/Include/JavaScript/logout.js"></script>

</body>

</html>
