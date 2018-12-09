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
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Input Stock <span class="sr-only">(current)</span></a>
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
        <div class="col-sm-6 offset-sm-3">
          <div class="card bg-light">
            <div class="card-header">Form Input</div>
            <div class="card-body">
              <form method="post" action="koneksi_newstock.php">
                <div class="form-group row">
                  <label for="season" class="col-sm-3 col-form-label">Season</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="season" name="season" placeholder="Season" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="product" class="col-sm-3 col-form-label">Product</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="product" name="product" placeholder="Product" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="color" class="col-sm-3 col-form-label">Color</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="color" name="color" placeholder="Color" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="color" class="col-sm-3 col-form-label">Qty</label>
                  <div class="col-sm-9">
                    <input type="number" min="1" class="form-control" id="qty" name="qty" placeholder="Qty" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                       </div>
                     </div>
                  </div>
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>      
    </div> <!-- end container -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
