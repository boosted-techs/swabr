<?php
defined('BASEPATH') OR exit('');
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title><?= $pageTitle ?></title>

        <!-- Favicon -->

        <!-- favicon ends -->

        <!-- LOAD FILES -->
        <link rel="stylesheet" href="/public/bootstrap5/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.8/font-awesome-animation.min.css">
<!--        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap-theme.min.css" media="screen">
<!--        <link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css">-->
<!--        <link rel="stylesheet" href="/public/font-awesome/css/font-awesome-animation.min.css">-->
        <link rel="stylesheet" href="/public/ext/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/r-2.4.0/sl-1.5.0/datatables.min.css"/>

<!--        <script src="/public/js/jquery.min.js"></script>-->

<!--        <script src="/public/bootstrap/js/bootstrap.min.js"></script>-->

            <link rel="shortcut icon" href="/public/images/zaks.jpeg">


<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">-->
<!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">-->
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.8/font-awesome-animation.min.css">-->
<!--        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">-->

<!--      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>-->


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="/public/bootstrap5/js/bootstrap.min.js"></script>
        <script src="/public/ext/select2/select2.min.js"></script>

        <!-- custom CSS -->
        <link rel="stylesheet" href="/public/css/main.css">
        <!-- custom JS -->
        <script src="/public/js/main.js?v=21"></script>
        <style>
            body {
                background: white !important;
                font-family: 'Open Sans', sans-serif;
                font-size: 16px !important;
            }
            .nav>li {
                font-family: 'Montserrat', sans-serif !important;
                background: #6c757d!important;
                border-bottom: 1px solid white;
                transition: 2s background;
            }

            .nav .fa {
                font-size: 25px !important;
            }

            .nav>li>a {
                color: white;
                font-size: 15px;
                padding: 20px 15px !important;
                border-radius: 0;
            }

            .nav>li>a:hover {
                background: orange;
                color:black;
                transition: 1s background;
            }
            .nav {
                background: white;
            }

            .active {
                background: orange !important;
            }
             .hidden {
                 display: none;
             }
            /*@media print {*/
            /*    body * {*/
            /*        visibility: hidden;*/
            /*    }*/

            /*    #barCodeTable, #barCodeTable * {*/
            /*        visibility: visible !important;*/
            /*    }*/

            /*    #barCodeTable {*/
            /*        display: block;*/
            /*        position: absolute !important;*/
            /*        left: 0 !important;*/
            /*        top: 0 !important;*/
            /*        width:100% !important;*/
            /*        background: black;*/
            /*    }*/
            /*}*/
            .search-overlay {
                display: none;
                position: fixed;
                top:95px;
                left: 0;
                width: 100%;
                height: 100vh;
                background: rgba(0,0,0, 0.8);
                z-index: 99999999999999
            }
            .search-overlay .card-body {
                height: 70vh;
                overflow-y: scroll;
            }
        </style>
    </head>

    <body style="">
    <nav class="navbar navbar-expand-sm bg-white nav-justified fixed-top shadow">

        <div class="container-fluid">
            <!-- Links -->
            <div class="navbar-header">
<!--                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">-->
<!--                    <span class="sr-only">Toggle navigation</span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                    <span class="icon-bar"></span>-->
<!--                </button>-->
                <a class="navbar-brand" href="/" style="margin-top:-15px">
                    <img src="/public/images/zaks.jpeg" alt="logo" class="img-responsive" width="80px">
                </a>
            </div>
            <form class="d-flex col-6">
                <input class="form-control me-2 rounded-0" type="text" id="navSearchInput" placeholder="Search for an item"  onkeyup="searchItem()">
                <button class="btn btn-primary" type="button" onclick="searchItem()"><span class="fa fa-search"></span></button>
            </form>
                <!-- Brand and toggle get grouped for better mobile display -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="#"><h5>Today: <b><span class="text-danger"><span id="totalEarnedToday"></span>/-</span></b></h5></a>
                    </li>
                    <li class="nav-item"  data-bs-toggle="modal" data-bs-target="#pwdReset">
                        <a class="nav-link text-dark" href="#"><h5 title="Click to change password"><span class="fa fa-lock"></span>PASSWORD</h5></a>
                    </li>
                </ul>

        </div>

    </nav>
<!--        <nav class="navbar navbar-default bg-white hidden-print shadow"  style="height: 100px; padding-top: 15px; background: white !important;">-->
<!--            <div class="container-fluid bg-white">-->
<!--                 Brand and toggle get grouped for better mobile display -->
<!--                <div class="navbar-header bg-white">-->
<!--                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarCollapse" aria-expanded="false">-->
<!--                        <span class="sr-only">Toggle navigation</span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                        <span class="icon-bar"></span>-->
<!--                    </button>-->
<!--                    <a class="navbar-brand" href="/" style="margin-top:-15px">-->
<!--                        <img src="/public/images/logo_black2.png" alt="logo" class="img-responsive" width="80px">-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                 Collect the nav links, forms, and other content for toggling -->
<!--                <div class="collapse navbar-collapse bg-white" id="navbarCollapse" style="background: white">-->
<!--                    <ul class="nav navbar-nav navbar-left visible-xs">-->
<!--                        <li class="left-list --><?//= $pageTitle == 'Dashboard' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('dashboard') ?><!--">-->
<!--                                <i class="fa fa-home"></i>-->
<!--                                Dashboard-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="left-list --><?//= $pageTitle == 'Items' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('items') ?><!--">-->
<!--                                <i class="fa fa-archive"></i>-->
<!--                                Manage Inventory-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="left-list --><?//= $pageTitle == 'Transactions' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('transactions') ?><!--">-->
<!--                                <i class="fa fa-dollar"></i>-->
<!--                                Transactions-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        --><?php //if($this->session->admin_role === "Super"):?>
<!--                      -->
<!--                        <li class="--><?//= $pageTitle == 'Employees' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('employees') ?><!--">-->
<!--                                <i class="fa fa-users"></i>-->
<!--                                Employees-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li class="--><?//= $pageTitle == 'Reports' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('reports') ?><!--">-->
<!--                                <i class="fa fa-newspaper-o"></i>-->
<!--                                Reports-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li class="--><?//= $pageTitle == 'Eventlog' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('Eventlog') ?><!--">-->
<!--                                <i class="fa fa-tasks"></i>-->
<!--                                Event Log-->
<!--                            </a>-->
<!--                        </li>--->
<!---->
<!--                        <li class="left-list --><?//= $pageTitle == 'Database' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('dbmanagement') ?><!--">-->
<!--                                <i class="fa fa-database"></i>-->
<!--                                Database Mgt-->
<!--                            </a>-->
<!--                        </li>-->
<!---->
<!--                        <li class="left-list --><?//= $pageTitle == 'Administrators' ? 'active' : '' ?><!--">-->
<!--                            <a href="--><?//= site_url('administrators') ?><!--">-->
<!--                                <i class="fa fa-unlock-alt"></i>-->
<!--                                Admin Mgt-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        --><?php //endif; ?>
<!--                    </ul>-->
<!--                    <ul class="nav navbar-nav navbar-right">-->
<!--                        <li class="dropdown">-->
<!--                            <a style="color: white">-->
<!--                                Total Earned Today: <b><span style="color: orange">shs <span id="totalEarnedToday"></span></span></b>-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="dropdown">-->
<!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">-->
<!--                                <i class="fa fa-user navbarIcons" style="color:#607d8b;"></i>-->
<!--                                <span class="caret"></span>-->
<!--                            </a>-->
<!--                            <ul class="dropdown-menu">-->
<!--                                <li class="dropdown-menu-header text-center">-->
<!--                                    <strong>Account</strong>-->
<!--                                </li>-->
<!--                                <li class="divider"></li>-->
<!--                               <li>-->
<!--                                    <a href="#">-->
<!--                                        <i class="fa fa-gear fa-fw"></i>-->
<!--                                        Settings-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="divider"></li>--->
<!--                                <li><a href="--><?//= site_url('logout') ?><!--"><i class="fa fa-power-off"></i> Logout</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </nav>-->

        <div class="container-fluid hidden-print" style="margin-top:80px">
            <div class="row content">
                <!-- Left sidebar -->
                <div class="col-sm-2 sidenav hidden-xs mySideNav bg-white mt-4">
                    <br>
                    <ul class="nav flex-column pointer">
                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == 'Dashboard' ? 'active' : '' ?>" href="<?= site_url('dashboard') ?>">
                                Dashboard
                            </a>
                        </li>
                        <?php if($this->session->admin_role === "Super"):?>
                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == 'Items' ? 'active' : '' ?>" href="<?= site_url('items') ?>">
                                Items
                            </a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $pageTitle == 'BarCodes' ? 'active' : '' ?>" href="<?= site_url('items/generate_bar_codes') ?>">
                                    Barcodes
                                </a>
                            </li>

                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == 'Transactions' ? 'active' : '' ?>" href="<?= site_url('transactions') ?>">
                                Transactions
                            </a>
                        </li>

                        <!--
                        <li class="<?= $pageTitle == 'Employees' ? 'active' : '' ?>">
                            <a href="<?= site_url('employees') ?>">
                                <i class="fa fa-users"></i>
                                Employees
                            </a>
                        </li>
                        <li class="<?= $pageTitle == 'Reports' ? 'active' : '' ?>">
                            <a href="<?= site_url('reports') ?>">
                                <i class="fa fa-newspaper-o"></i>
                                Reports
                            </a>
                        </li>
                        <li class="<?= $pageTitle == 'Eventlog' ? 'active' : '' ?>">
                            <a href="<?= site_url('Eventlog') ?>">
                                <i class="fa fa-tasks"></i>
                                Event Log
                            </a>
                        </li>--->

<!--                        <li class="nav-item">-->
<!--                            <a class="nav-link --><?//= $pageTitle == 'Database' ? 'active' : '' ?><!--" href="--><?//= site_url('dbmanagement') ?><!--">-->
<!--                                DB Mgt-->
<!--                            </a>-->
<!--                        </li>-->

                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == 'Administrators' ? 'active' : '' ?>" href="<?= site_url('administrators') ?>">
                                Admin Mgt
                            </a>
                        </li>

                            <li class="nav-item">
                                <a class="nav-link <?= $pageTitle == 'Txs' ? 'active' : '' ?>" href="<?= site_url('transactions/tx') ?>">
                                    Transaction List
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if($this->session->admin_role === "Basic"):?>

                        <li class="nav-item">
                            <a class="nav-link <?= $pageTitle == 'Transactions' ? 'active' : '' ?>" href="<?= site_url('transactions') ?>">
                                Transactions
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link " href="<?= site_url('logout') ?>">
                                LOGOUT
                            </a>
                        </li>

                    </ul>
                    <br>
                </div>
                <!-- Left sidebar ends -->
                <br>

                <!-- Main content -->
                <div class="col-md-10 mt-5">
                    <?= isset($pageContent) ? $pageContent : "" ?>
                </div>
                <!-- Main content ends -->
            </div>
        </div>

        <!--Modal to show flash message-->
        <div id="flashMsgModal" class="modal fade" role="dialog" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" id="flashMsgHeader">
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        <center><i id="flashMsgIcon"></i> <font id="flashMsg"></font></center>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal end-->

        <!--modal to display transaction receipt when a transaction's ref is clicked on the transaction list table -->
        <div class="modal fade" role='dialog' data-backdrop='static' id="transReceiptModal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header hidden-print">
                        <h4 class="text-center">Transaction Receipt</h4>
                        <button class="btn-close" data-bs-dismiss='modal'></button>
                    </div>
                    <div class="modal-body" id='transReceipt'></div>
                </div>
            </div>
        </div>
        <!-- End of modal-->


        <!--Login Modal-->
        <div class="modal fade" role='dialog' data-backdrop='static' id='logInModal'>
            <div class="modal-dialog">
                <!-- Log in div below-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="text-center">Log In</h4>
                        <button class="btn btn-danger float-end close closeLogInModal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="logInModalFMsg" class="text-center errMsg"></div>
                        <form name="logInModalForm">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <label for='logInModalEmail' class="control-label">E-mail</label>
                                    <input type="email" id='logInModalEmail' class="form-control checkField rounded-0" placeholder="E-mail" autofocus>
                                    <span class="help-block errMsg" id="logInModalEmailErr"></span>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label for='logInPassword' class="control-label">Password</label>
                                    <input type="password" id='logInModalPassword'class="form-control checkField rounded-0" placeholder="Password">
                                    <span class="help-block errMsg" id="logInModalPasswordErr"></span>
                                </div>
                            </div>
                            <div class="row">
                                <!--<div class="col-sm-6 pull-left">
                                    <input type="checkbox" class="control-label" id='remMe'> Remember me
                                </div>-->
                                <div class="col-sm-12"></div>
                                <div class="col-sm-12">
                                    <button id='loginModalSubmit' class="btn btn-primary form-control rounded-0 mt-2">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End of log in div-->
            </div>
        </div>
        <!---end of Login Modal-->

    <!--  reset pwd Modal-->
    <div class="modal fade" role='dialog' data-backdrop='static' id='pwdReset'>
        <div class="modal-dialog">
            <!-- Log in div below-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-center">Reset password</h4>
                    <span class="btn btn-danger btn-close float-end" data-bs-dismiss="modal">&times;</span>
                </div>
                <div class="modal-body">
                    <form name="" method="post" action="/dashboard/pwd_reset">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for='' class="control-label">old password</label>
                                <input type="text" id='' name="pwd" class="form-control checkField rounded-0" placeholder="Old password" autofocus>

                            </div>
                            <div class="col-sm-12 form-group">
                                <label for='logInPassword' class="control-label">new Password</label>
                                <input type="password" name="pwd1" class="form-control checkField rounded-0" placeholder="new Password">
                            </div>
                            <div class="col-sm-12 form-group">
                                <label for='logInPassword' class="control-label">Repeat new Password</label>
                                <input type="password" name="pwd2" class="form-control checkField rounded-0" placeholder="repeat new Password">
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-sm-6 pull-left">
                                <input type="checkbox" class="control-label" id='remMe'> Remember me
                            </div>-->
                            <div class="col-sm-12"></div>
                            <div class="col-sm-12">
                                <button class="btn btn-primary form-control rounded-0 mt-2">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End of log in div-->
        </div>
    </div>
    <!---end of Login Modal-->
    <div class="search-overlay">
        <div class="card col-md-7 mx-auto rounded-0">
            <div class="card-header rounded-0">
                <h4>Search results for <span id="queryTerm" class="text-info"></span></h4>
            </div>
            <div class="card-body" id="searchResults"></div>
            <div class="card-footer">
                <button class="btn btn-danger float-end" onclick="closeSearchOverlay()">Close</button>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/r-2.4.0/rr-1.3.1/sl-1.5.0/datatables.min.js"></script>
    </body>
<script>
    function printDiv(divId) {
        let printContents = document.getElementById(divId).innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = `<html><head><title></title><style>body{font-size: 14px !important;} .hidden-print{display: none} h3{font-size:16px; font-weight: bolder;}#transReceiptToPrint {margin:15px !important;} tr td{font-size: 14px; font-family:thermal !important;} tr th{font-size: 14px}</style></head><body>` + printContents + `</body>`;
        window.print();
        document.body.innerHTML = originalContents;
        window.location.reload()
    }
</script>
</html>