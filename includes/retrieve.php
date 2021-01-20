<?php

include_once 'includes/connect.php';

$result = mysqli_query($conn, "INSERT INTO datasensor (data) VALUES ('" . $_GET["data"] . "')");

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));
}
