<?php ?>

<html lang="pl-PL">
<body>
<!--region  Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/gr4/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Brilliant Bank</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/gr4/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">Twoje sprawy</div>

    <!-- Nav Item - Transfers -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transfersMenu" aria-expanded="true"
           aria-controls="transfersMenu">
            <i class="fas fa-fw fa-exchange-alt"></i>
            <span>Przelewy</span>
        </a>
        <div id="transfersMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Rodzaj przelewu</h6>
                <a class="collapse-item" href="/gr4/dashboard/foreignTransfer"><i
                            class="fas fa-long-arrow-alt-right"></i> Na rachunek obcy</a>
                <a class="collapse-item" href="/gr4/dashboard/selfTransfer"><i class="fas fa-long-arrow-alt-left"></i>
                    Na rachunek własny</a>
            </div>
        </div>
    </li>

    <li class="nav-item">

    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsMenu" aria-expanded="true"
           aria-controls="productsMenu">
            <i class="fas fa-fw fa-folder"></i>
            <span>Produkty</span>
        </a>
        <div id="productsMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Rodzaj produktu</h6>
                <a class="collapse-item" href="/gr4/dashboard/products"><i class="fas fa-wallet"></i></i> Wszystkie</a>
                <a class="collapse-item" href="/gr4/dashboard/products/savings"><i class="fas fa-piggy-bank"></i></i>
                    Oszczędności</a>
                <a class="collapse-item" href="/gr4/dashboard/products/cards"><i class="fas fa-credit-card"></i></i>
                    Karty</a>
                <a class="collapse-item" href="/gr4/dashboard/products/loans"><i
                            class="fas fa-hand-holding-usd"></i></i> Kredyty</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/gr4/dashboard/history">
            <i class="fas fa-fw fa-table"></i>
            <span>Historia</span></a>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
           aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


</ul>
<!-- endregion -->
</body>
</html>