<?php
session_start();

if(!isset($_POST['submit'])){
    header("location:login.php");
    die();
}
session_unset();
session_destroy();

header("location:login.php");