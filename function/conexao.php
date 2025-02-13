<?php 

$server="localhost";
$user="root";
$pass="";
$dbname="pdv";

$conn = mysqli_connect($server, $user, $pass, $dbname);

if (!$conn) {
    die("connection failed: " . mysqli_connect_error());
}

session_start();

