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


    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

            <!-- Begin Page Content -->
            <div class="container-fluid mb-5">

                <!-- Page Heading -->
                <h1 class="h5 mb-2 text-gray-800">Historia</h1>
                <div class="container col-xl-8 col-lg-8">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Historia za okres:</h6>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3"
                                       data-toggle="collapse" role="button" aria-expanded="true"
                                       aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Ustawienia filtrów</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardExample">
                                        <div class="card-body">
                                            <div class="form-group row ">
                                                <div class="container">
                                                    <form class="transfer" action="/gr4/dashboard/history"
                                                          method="POST">
                                                        <div class="form-group row ">
                                                            <div class="container">
                                                                <select class="browser-default custom-select"
                                                                        id="fromAccount" name="fromAccount">
                                                                    <option selected disabled>Z rachunku:</option>
                                                                    <option value="1">One - saldo</option>
                                                                    <option value="2">Two - saldo</option>
                                                                    <option value="3">Three- saldo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group form-inline ">
                                                            <label for="sinceDate" class="mx-2">Od: </label>
                                                            <input type="date" id="sinceDate"
                                                                   class="form-control form-control-user"
                                                                   name="sinceDate"
                                                                   placeholder="Data wykonania" value=""
                                                                   autocomplete="off"/>
                                                            <label for="tillDate" class="mx-2">Od: </label>
                                                            <input type="date" id="tillDate"
                                                                   class="form-control form-control-user"
                                                                   name="tillDate"
                                                                   placeholder="Data wykonania" value=""
                                                                   autocomplete="off/">
                                                        </div>
                                                        <div class="form-group form-control-user">
                                                            <button class="btn btn-primary" type="submit"
                                                                    name="historySubmit">Szukaj
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="historyTable" width="100%" cellspacing="0">
                                        <thead>
                                        <tr>
                                            <th>Data transakcji</th>
                                            <th>Odbiorca/Nadawca</th>
                                            <th>Tytuł</th>
                                            <th>Kwota</th>
                                            <th>Akcje</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Data transakcji</th>
                                            <th>Odbiorca/Nadawca</th>
                                            <th>Tytuł</th>
                                            <th>Kwota</th>
                                            <th>Akcje</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                                        if (isset($_SESSION['users'])) {
                                            $users = $_SESSION['users'];
                                        }
                                        if (isset($users)) {
                                            foreach ($users as $user) {
                                                echo /** @lang T */
                                                "
                                                    <tr>
                                                        <th>$user->firstName</th>
                                                        <th>$user</th>
                                                        <th>$user</th>
                                                        <th>$user</th>
                                                        <th>$user</th>
                                                    </tr>";
                                            }
                                        }
                                        ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <!--endregion -->


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
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Page level plugins -->
<script src="../vendor/datatables/jquery.dataTables.js"></script>
<script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugins -->
<script src="../vendor/chart.js/Chart.min.js"></script>

<!--Automatic logout script-->
<script src="../UserInterface/Views/Include/JavaScript/logout.js"></script>

<script>
    $(document).ready(function () {
        $('#historyTable').DataTable(
            {
                language: {
                    search: "a",
                    url: "//cdn.datatables.net/plug-ins/1.10.21/i18n/Polish.json",
                }
            })


    });
</script>
</body>

</html>
