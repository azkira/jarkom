<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "fpjarkomlab";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$db = mysqli_select_db($conn, 'fpjarkomlab');

if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}
