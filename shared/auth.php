<?php
//authentication check
//user must have a valid session to load the required page
session_start();
if (empty($_SESSION['username'])){
    header('location:login.php');
}