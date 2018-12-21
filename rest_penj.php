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
    <!-- Addition CSS -->
    <link type="text/css" rel="stylesheet" href="css/dashboard.css"  media="screen,projection"/>

  </head>
  <body>
    <!-- Navbar Menu -->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">MONANISA</a>
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="koneksi_logout.php">Logout</a>
        </li>
      </ul>
    </nav>
    <!-- Sidebar -->
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="dashboard.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="input_stock.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                Input Stock
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                Restock/Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_stock.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                Data Stock
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Content -->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">      
      <div class="vc_empty_space" style="height: 50px"><span class="vc_empty_space_inner"></span></div> <!--Untuk space-->
        <div class="row">
          <div class="col-sm-6">
            <h2>Restock/Penjualan</h2>
            <div class="vc_empty_space" style="height: 20px"><span class="vc_empty_space_inner"></span></div> <!--Untuk space-->
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
                  <button type="submit" name="submit" value="submit" class="btn btn-secondary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>  
      </main>
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
