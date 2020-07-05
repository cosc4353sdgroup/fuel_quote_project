<?php

$serverName = "localhost";
$dBUsername = "root";
$dBPassword ="";
$dBName = "fuelquote";

$conn = new mysqli($serverName,$dBUsername,$dBPassword, $dBName);

if(!$conn){
    die("Connection Failed: ".mysql_connect_error());
}