<?php
include_once "linkController.php";
include_once "classDatabase.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('location: page-login.php');
}
if (isset($_GET['Logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: page-login.php");
}

    linkController::SearchEverythingPage();
    ?>

               