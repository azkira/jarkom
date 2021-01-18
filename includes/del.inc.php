<?php
include 'connect.php';

$id = $_GET['status_id'];
$del = mysqli_query($conn, "DELETE FROM stat where status_id = '$id'");

if ($del) {
  mysqli_close($conn); // Close connection
  header("location: ../index.php"); // redirects to all records page
  
  exit;
} else {
  echo "Error deleting record"; // display error message if not delete
}
