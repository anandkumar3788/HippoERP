<?php session_start();
include_once('../../includes/config.php');

if (strlen($_SESSION['adminid']==0)) {
  header('location:logout.php');


  $id = $_POST['id'];
  mysqli_query($conn, "UPDATE comments SET is_read = 1 WHERE is_read = 0 ");
?>
