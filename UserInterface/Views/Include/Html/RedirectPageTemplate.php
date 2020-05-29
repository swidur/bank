<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $this->model->getPageTitle() ?></title>

    <!-- Bootstrap core CSS -->
    <!--    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="../UserInterface/Views/Include/Css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="padded">
<!-- Fixes firefox FOUC rendering error, dont delete or move -->
<script>0</script>
<!-- end -->

<div class="container">
    <h2 class="mt-4 mb-3"><?php echo $this->model->getHeading() ?>
        <!--      <small>Subheading</small>-->
    </h2>
    <div class="row justify-content-center">
        <div class="col-xl-12 col-lg-12 col-md-9">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php echo $this->model->getCardTitle() ?></h6>
                </div>
                <div class="card-body">
                    <?php echo $this->model->getMessage() ?>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>