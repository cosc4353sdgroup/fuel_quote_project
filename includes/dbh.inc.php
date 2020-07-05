<?php
//database connection file
$serverName = "localhost";
$dBUsername = "root";
$dBPassword ="";
$dBName = "fuelquote";

$conn = new mysqli($serverName,$dBUsername,$dBPassword, $dBName);

//if no connection then return connection failed and reason why
if(!$conn){
    die("Connection Failed: ".mysql_connect_error());
}