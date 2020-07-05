<?php

    require 'dbh.inc.php';


    session_start();

    //pull values from profile manager and assign variables below

    $fullname = $_POST['fullname'];
    $address = $_POST['addy'];
    $address2 = $_POST['addy2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $username=$_SESSION['userid'];

    //sql statement to update the database
    $sql = "UPDATE users SET fullname = '$fullname', userstaddy = '$address', userstaddy2 = '$address2', usercity = '$city', userst = '$state', userzip = '$zip' WHERE  userid = $username;";

    echo $username;

    //return update sucessful else return update failed
    if (mysqli_query($conn, $sql)) {
        header("Location:../profilemanager.php?update=success");
        exit();
       } 
    else {
        header("Location:../profilemanager.php?update=failed");
        exit();
       }