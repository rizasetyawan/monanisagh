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
          <li class="nav-item">
            <a class="nav-link" href="input_stock.php">Input Stock</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="rest_penj.php">Input Restock/Penjualan</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">Data Stock<span class="sr-only">(current)</span></a>
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
        <div class="col-sm-12">
          <div class="card text-center">
            <div class="card-header">
              Data Stock Monanisa
            </div>
            <div class="card-body">
              <table class="table table-hover">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Season</th>
                    <th scope="col">Product</th>
                    <th scope="col">Color</th>
                    <th scope="col">Status</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Product Code</th>
                  </tr>
                </thead>
                <?php                  
                  $select = "SELECT * from stock";
                  if (mysqli_query($conn, $select)) {
                  echo "";
                  } else {
                  echo "Error: " . $select . "<br>" . mysqli_error($conn);
                  }
                  $count=1;
                  $result = mysqli_query($conn, $select);
                  if (mysqli_num_rows($result) > 0) {
                  // output data of each row
                  while($row = mysqli_fetch_assoc($result)) { ?>
                <tbody>
                  <tr>
                    <th scope="row">
                      <?php echo $row["id"]; ?>
                    </th>
                    <td>
                      <?php echo $row["created_date"]; ?>
                    </td>
                    <td>
                      <?php echo $row["season"]; ?>
                    </td>
                    <td>
                      <?php echo $row["product"]; ?>
                    </td>
                    <td>
                      <?php echo $row["color"]; ?>
                    </td>
                    <td>
                      <?php echo $row["status"]; ?>
                    </td>
                    <td>
                      <?php echo $row["qty"]; ?>
                    </td>
                    <td>
                      <?php echo $row["created_by"]; ?>
                    </td>
                    <td>
                      <?php echo $row["product_code"]; ?>
                    </td>
                  </tr>
                </tbody>
                <?php
                  $count++;
                  }
                  } else {
                  echo "0 results";
                  }
                ?>
              </table>
            </div>
            <div class="card-footer text-muted">
              2 days ago
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
