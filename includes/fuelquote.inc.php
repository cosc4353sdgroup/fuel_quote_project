<?php
    require 'dbh.inc.php';

    session_start();

    //variables that are pulled from fuel quote page

    $gallons = $_POST['gallonsReq'];
    $delivery = $_POST['delState'];
    $deliverydate = $_POST['delDate'];
    $netCost = 1.50;
    $companyProfit = 1.1;
    $userid = $_SESSION['userid'];

    //run history count query

    $hist_count = mysqli_query($conn,"SELECT COUNT(quoteNum) FROM quotes WHERE userid = $userid;");

    //if statement for quote price 
    if($delivery == 'TX'){
        $pricePerGal = $netCost * 1.02;
    }
    else{
        $pricePerGal = $netCost * 1.04;
    }    
    if(mysqli_query($conn,"SELECT COUNT(quoteNum) FROM quotes WHERE userid = $userid;") > 0){
        $pricePerGal = $pricePerGal / 1.01;
    }
    if($gallons > 1000){
        $pricePerGal = $pricePerGal * 1.02;
    }
    else{
        $pricePerGal = $pricePerGal * 1.03;
    }

    $pricePerGal = $pricePerGal * $companyProfit;
    $totalQuote = ($pricePerGal * $gallons);

    //sql statement for insterting quote information to the statbase
    $sql = "INSERT INTO quotes (userid, gallons, delState, delDate, pricePerGal, quotePrice) VALUES ($userid,$gallons,'$delivery','$deliverydate', $pricePerGal, $totalQuote)";
    //then send to quote view page which displays the quote price per gallon and the total
    if (mysqli_query($conn, $sql)) {
        header("Location:../quoteView.php");
        exit();
    }
