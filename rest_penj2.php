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

    <!-- Option Value JQuery-->
    
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
          <li class="nav-item active">
            <a class="nav-link" href="#">Input Restock/Penjualan <span class="sr-only">(current)</span></a>
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
            <div class="card-header">Restock/Penjualan</div>
            <div class="card-body">
              <form method="post" action="koneksi_insert.php">
              <!-- SEASON -->
                <div class="form-group row">
                  <label for="season" class="col-sm-3 col-form-label">Season</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="season" name="season" onChange="change_season()">
                    <option> Select </option>
                    <?php 
                      $sql_season = mysqli_query($conn, 'SELECT season FROM new_stock GROUP BY season');
                      while ($row_season = mysqli_fetch_array($sql_season)){                        
                    ?>
                        <option value="<?php echo $row_season['season'];?>" id="<?php echo $row_season['season'];?>"><?php echo $row_season['season'];?></option>    
                      <?php }?>                 
                    </select>
                  </div>
                </div>
                <!-- PRODUCT -->
                <div class="form-group row">
                  <label for="product" class="col-sm-3 col-form-label">Product</label>
                  <div class="col-sm-9">
                  <select class="form-control" id="product" name="product" onChange='change_product()'>
                    <option id = "product" value = "product"> Select </option>
                  </select>
                  </div>
                </div>
                <!-- COLOR -->
                <div class="form-group row">
                  <label for="color" class="col-sm-3 col-form-label">Color</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="color" name="color">      
                      <option id = "color" value = "color"> Select </option> 
                    </select>
                  </div>
                </div>
                <!-- STATUS -->
                <div class="form-group row">
                  <label for="status" class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="status" name="status">
                        <option>Penjualan</option>
                        <option>Restock</option>                        
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="qty" class="col-sm-3 col-form-label">Qty</label>
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


    <script type="text/javascript"> 
      function change_season(){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?season="+document.getElementById("season").value, false);
        xmlhttp.send(null);
        // alert(xmlhttp.responseText);
        document.getElementById("product").innerHTML=xmlhttp.responseText;
      }    
      function change_product(){
        // alert(document.getElementById("product").value);
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?product="+document.getElementById("product").value, false);
        xmlhttp.send(null);        
        // alert(xmlhttp.responseText);
        document.getElementById("color").innerHTML=xmlhttp.responseText;
      }    
    </script>                 
    <!-- Optional JavaScript -->
    <!-- <script src="jquery-1.10.2.min.js"></script>
    <script src="jquery.chained.min.js"></script>
    <script>
      $("#product").chained("#season");
      $("#color").chained("#product");
    </script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
