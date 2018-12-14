<!doctype html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include "connection.php";
$admin = $_SESSION['username'];
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  </head>
  <body>
    <!-- Navbar Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <a class="navbar-brand" href="#">MONANISA</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="input_stock.php">Input Stock</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rest_penj.php">Input Restock/Penjualan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_stock.php">Data Stock</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="koneksi_logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>

<!-- Form Input -->
    <div class="container">
    <div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div> <!--Untuk space-->
      <div class="row">
        <div class="col-sm-3">
          <div class="card text-white bg-dark mb-3" style="width: 16rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Stock</h5>
                <?php
                  $jumlah_stock = 0;
                  $qry = mysqli_query($conn,"SELECT sum(qty) total from (SELECT qty FROM new_stock UNION ALL SELECT qty FROM stock WHERE STATUS = 'restock') t");
                  while($row = mysqli_fetch_array($qry)){
                    $jumlah_stock = $row[0];
                  }
                ?>
              <p class="card-text"><?php echo $jumlah_stock;?> Pcs</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card text-white bg-dark mb-3" style="width: 16rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Terjual</h5>
                <?php
                  $penjualan = 0;
                  $qry = mysqli_query($conn,"SELECT sum(qty) FROM stock WHERE STATUS = 'Penjualan'");
                  while($row = mysqli_fetch_array($qry)){
                    $penjualan = $row[0];
                  }
                ?>
              <p class="card-text"><?php echo $penjualan;?> Pcs</p>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card text-white bg-dark mb-3" style="width: 16rem;">
            <div class="card-body">
              <h5 class="card-title">Jumlah Terjual</h5>
                <?php
                  $penjualan = 0;
                  $qry = mysqli_query($conn,"SELECT sum(qty) FROM stock WHERE STATUS = 'Penjualan'");
                  while($row = mysqli_fetch_array($qry)){
                    $penjualan = $row[0];
                  }
                ?>
              <p class="card-text"><?php echo $penjualan;?> Pcs</p>
            </div>
          </div>
        </div>  
      </div>         
    </div> <!-- End of Container-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
