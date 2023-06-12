<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log in</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="/public/images/zaks.jpeg">
        <!-- favicon ends --->
        
        <!--- LOAD FILES -->

        <link rel="stylesheet" href="/public/bootstrap5/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/font-awesome/css/font-awesome.min.css">

        <script src="/public/js/jquery.min.js"></script>
        <script src="/public/bootstrap5/js/bootstrap.min.js"></script>
        <!--
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        -->
        <!-- CSS -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300&family=Open+Sans:wght@300&family=Montserrat:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/public/css/form-elements.css">
        <link rel="stylesheet" href="/public/css/style.css">
        <link rel="stylesheet" href="/public/css/main.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
            body {
                /*font-family: 'Open Sans', sans-serif;*/
                font-family: 'Montserrat', sans-serif;
                /*background: #ffffff !important; */
            }
        </style>

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content bg-light">

            <div class="inner-bg">
                <div class="col-md-8 mx-auto row">
                    <div class="col-md-6  rounded-start shadow-lg" style="background-image: url('/public/images/harvesting.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat"></div>
                    <div class="col-md-6 rounded-circle shadow-lg bg-white rounded-start" style="height: 500px !important;">
                        <div class="text-end  p-0 m-0">
                            <img src="/public/images/zaks.jpeg" alt="1410-logo" height="150px">
                        </div>
                        <div style="margin-top: -40px; margin-bottom: 30px">
                            <div class="pr-4 pl-4" style="width: 90%">
                                <div class="bg-primary text-center text-white">
                                    <span id="errMsg"></span>
                                </div>
                                <div class="form-bottom bg-transparent">
                                    <form id="loginForm">
                                        <div class="form-group">
                                            <h5 class="sr-only" for="email">E-mail</h5>
                                            <input type="email" placeholder="Email" class="form-control checkField border-1  border-primary bg-transparent" id="email" >
                                        </div>
                                        <div class="form-group">
                                            <h5 class="sr-only mt-2" for="password">Password</h5>
                                            <input type="password" placeholder="Password" class="form-control checkField border-1 border-primary bg-transparent" id="password" >
                                        </div>
                                        <button type="submit" class="btn rounded-0 btn-primary mt-3">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <!-- Javascript -->
        <script src="/public/js/main.js"></script>
        <script src="/public/js/access.js"></script>
        <script src="/public/js/jquery.backstretch.min.js"></script>
        <!--Javascript--->

    </body>

</html>