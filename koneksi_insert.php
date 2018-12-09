<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  session_start();
  
  include "connection.php";
  if (isset($_POST["submit"])) {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d h:i:s', time());
    $season = $_POST['season'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $status = $_POST['status'];
    $qty = $_POST['qty'];
    $productcode = $_POST['productcode'];
    $submit = $_POST['submit'];
    $admin = $_SESSION['username'];  
    $code = $season."-".substr($product, 0,2)."-".$color;   

    if ($admin !== NULL) {
      $insert = "INSERT INTO stock SET id = 'NULL', created_date = '$date', season = '$season', product = '$product', color = '$color', status = '$status', qty = '$qty', created_by = '$admin', product_code = '$code'";
      $result = mysqli_query($conn, $insert);
      echo("<script>alert('Data Updated!');window.location.href='rest_penj.php';</script>");
    } else {
      echo("<script>alert('Please login first to update data!');window.location.href='rest_penj.php';</script>");
    }
    mysqli_close($conn);
  }
?>
