<?php
$data = $_POST['status_data'];
$link = '../input.php';
require_once "connect.php";
if (empty($data)) {
  mysqli_refresh($link, MYSQLI_ASSOC);
} else {
  $query = mysqli_query($conn, "INSERT INTO stat (status_data) VALUES ('$data')");
}

header("location: ../input.php");
