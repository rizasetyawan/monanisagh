<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  session_start();
  
  include "connection.php";
  if (isset($_POST["submit"])) {
    
    $season = $_POST['season'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $submit = $_POST['submit'];
    $admin = $_SESSION['username'];    

    if ($admin !== NULL) {
      $insert = "INSERT INTO season SET id_season = 'NULL', season = '$season', product = '$product', color = '$color'";
      $result = mysqli_query($conn, $insert);
      echo("<script>alert('Data Updated!');window.location.href='input_stock.php';</script>");
    }else{
      echo("<script>alert('Please login first to update data!');window.location.href='input_stock.php';</script>");
    }
    mysqli_close($conn);  
  }
?>
