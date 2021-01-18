<?php
$data = $_POST['data'];

require_once 'connect.php';

$query = mysqli_query($conn, "INSERT INTO stat (data) VALUES ('$data')");

header("location: ../input.php");
