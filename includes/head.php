<?php
ob_start();
// this function is used to turn on output buffering.
//  Output buffering allows you to send headers after you have already sent output.
//   This is useful when working with redirects, which must be sent before any output.
require "dbcon.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Your Sailing Adventure </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="hugo 0.101.0">
    <link rel="icon" href="../pictures/favicon (1).ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.14.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="Styles/main.css">
    <script src="https://kit.fontawesome.com/de7c5bb96e.js" crossorigin="anonymous"></script>

</head>


<body>
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Trip4Life</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <a class="nav-link" href="index.php#booktrip"> Book trip</a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php#boats"> Boats</a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="index.php#trips"> Out trips </a>
                </ul>
                <ul class="navbar-nav">
                    <a class="nav-link" href="contact.php"> Contact us </a>
                </ul>


                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>


                    <?php if (isset($_SESSION['username'])) {
                        if ($_SESSION['role'] === 'admin') {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./admin/index.php">Admin</a>
                    </li>
                    <?php }
                    } ?>


                    <?php if (!isset($_SESSION['username'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Register</a>
                    </li>

                    <?php } else { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <?php echo $_SESSION['firstname']; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a class="nav-link profile-link" href="profile.php">
                                    <i class="fas fa-user"></i> Profile
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link profile-link" href="logout.php">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </a>
                            </li>


                        </ul>
                        <?php } ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>

    <div class="container marketing">