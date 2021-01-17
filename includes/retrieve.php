<?php
require_once 'connect.php';

$result = mysqli_query($conn, "INSERT INTO stat (data) VALUES ('" . $_GET["data"] . "')");

if (!$result) {
  die('Invalid query: ' . mysqli_error($conn));
}
