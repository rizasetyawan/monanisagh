<?php
  error_reporting(E_ERROR | E_WARNING | E_PARSE);
  session_start();
  
  include "connection.php";
  if (isset($_POST["submit"])) {
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d H:i:s', time());
    $season = $_POST['season'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $qty = $_POST['qty'];
    $submit = $_POST['submit'];
    $admin = $_SESSION['username'];  
    $code = $season."-".substr($product, 0,2)."-".$color;   

    if ($admin !== NULL) {
      $insert = "INSERT INTO new_stock SET created_date = '$date', season = '$season', 
        product = '$product', color = '$color', status = 'New Stock', qty = '$qty', created_by = '$admin', product_code = '$code'";
      $result = mysqli_query($conn, $insert);
      echo("<script>alert('Data Updated!');window.location.href='input_stock.php';</script>");
    }else{
      echo("<script>alert('Please login first to update data!');window.location.href='input_stock.php';</script>");
    }
    mysqli_close($conn);  
  }
?>
