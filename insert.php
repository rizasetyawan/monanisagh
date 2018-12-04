<?php
  session_start();
  
  include "connection.php";
  if (isset($_POST["submit"])) {
    // $date = $_POST['date'];
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



    $insert = "INSERT INTO stock SET id = 'NULL', created_date = '$date', season = '$season', product = '$product', color = '$color', status = '$status', qty = '$qty', created_by = '$admin', product_code = '$productcode'";
    $result = mysqli_query($conn, $insert);

    if ($result) {
      echo "";
      header('Location: index.php');
    } else {
      echo "Input gagal";
    }
    mysqli_close($conn);
  }
?>
