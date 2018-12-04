<?php
  include "connection.php";
  if (isset($_POST["submit"])) {
    $season = $_POST['season'];
    $product = $_POST['product'];
    $color = $_POST['color'];
    $status = $_POST['status'];
    $qty = $_POST['qty'];
    $productcode = $_POST['productcode'];
    $submit = $_POST['submit'];
    $insert = "INSERT INTO stock SET id = 'NULL', created_date = 'NULL',season = '$season', product = '$product', color = '$color', status = '$status', qty = '$qty', created_by = 'riza', product_code = '$productcode'";
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
