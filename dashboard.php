<!doctype html>
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
include "connection.php";
$admin = $_SESSION['username'];
?>

<?php
try{
  $dbcon=new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
  die($ex->getMessage());
}
$stmt=$dbcon->prepare("SELECT season, SUM(qty) as qty FROM stock WHERE status = 'penjualan' GROUP BY season");
$stmt->execute();
$jsonseason=[];
$jsonjumlah=[];

while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $season=$row['season'];
  $jumlah = $row['qty'];
  $jsonseason[]=$season;
  $jsonjumlah[]=$jumlah;
}
?>
<?php
try{
  $dbcon=new PDO("mysql:host={$servername};dbname={$dbname}",$username,$password);
  $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
  die($ex->getMessage());
}
$stmt=$dbcon->prepare("SELECT season, SUM(qty) as qty FROM stock WHERE status = 'penjualan' GROUP BY season");
$stmt->execute();
$jsonseasonprofit=[];
$jsonprofit=[];

while ($row=$stmt->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $seasonprofit=$row['season'];
  $profit = $row['qty'];
  $jsonseasonprofit[]=$seasonprofit;
  $jsonprofit[]=$profit * 11000;
}
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
    <!-- Script Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <!-- CSS Chart.js -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> -->
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
            <a class="nav-link active" href="#">
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
            <a class="nav-link" href="rest_penj.php">
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
              <h5 class="card-title">Total Profit</h5>
                <?php
                  $penjualan = 0;
                  $qry = mysqli_query($conn,"SELECT sum(qty) FROM stock WHERE STATUS = 'Penjualan'");
                  while($row = mysqli_fetch_array($qry)){
                    $penjualan = $row[0];
                    $profit = $penjualan * 11000;
                  }
                ?>
              <p class="card-text">Rp. <?php echo $profit;?></p>
            </div>
          </div>
        </div>  
      </div> <!-- End of Row -->  
      <!-- Chart -->
      <div class="row">
        <!-- Chart Penjualan -->
        <div class="col s12">
          <div class="card"> <!--warna-->
            <div class="card-content black-text">
              <div class="chart-responsive">
                <canvas id="linechart" class="chartjs-render-monitor" height="80"></canvas>
                <script>
                  var ctx = document.getElementById("linechart").getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($jsonseason);?>,
                        datasets: [{
                            label: 'Penjualan',
                            data: <?php echo json_encode($jsonjumlah);?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.2)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                    }
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="vc_empty_space" style="height: 25px"><span class="vc_empty_space_inner"></span></div> <!--Untuk space-->
      <!-- Chart Profit -->
      <div class="row">
        <div class="col s12">
          <div class="card"> <!--warna-->
            <div class="card-content black-text">
              <div class="chart-responsive">
                <canvas id="barchart" class="chartjs-render-monitor" height="80"></canvas>
                <script>
                  var ctx = document.getElementById("barchart").getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($jsonseasonprofit);?>,
                        datasets: [{
                            label: 'Profit',
                            data: <?php echo json_encode($jsonprofit);?>,
                            backgroundColor: [
                              'rgba(105, 105, 105, 0.6)',
                              'rgba(220, 220, 220, 0.6)',
                              'rgba(210, 180, 140, 0.6)',
                              'rgba(245, 222, 179, 0.6)',
                              'rgba(95, 158, 160, 0.6)',
                              'rgba(72, 209, 204, 0.6)',
                              'rgba(173, 216, 230, 0.6)',
                              'rgba(102, 205, 170, 0.6)',
                              'rgba(143, 188, 139, 0.6)',
                              'rgba(107, 142, 35, 0.6)',
                              'rgba(144, 238, 144, 0.6)',
                              'rgba(147, 112, 2019, 0.6)',
                              'rgba(255, 218, 185, 0.6)',
                              'rgba(255, 160, 122, 0.6)',
                              'rgba(255, 182, 193, 0.6)',
                              'rgba(205, 92, 92, 0.6)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                      scales: {
                          yAxes: [{
                              ticks: {
                                  beginAtZero:true
                              }
                          }]
                      }
                    }
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div><!-- endchart -->
      <!-- Table -->
      <div class="row">
        <div class="card-body">
          <table class="table table-sm">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Season</th>
                <th scope="col">Product</th>
                <th scope="col">Color</th>
                <th scope="col">Input Stock</th>
                <th scope="col">Restock</th>
                <th scope="col">Penjualan</th>
                <th scope="col">Sisa Stock</th>
              </tr>
            </thead>
          <?php                  
            $select = mysqli_query($conn,"SELECT * FROM new_stock");
               
            $count=1;
            $numbering=1;
            while($row = mysqli_fetch_array($select)){ 
              $code = $row['product_code'];  
          ?>
          <tbody>
            <tr>
            <!-- no -->
              <th scope="row">
              <?php echo $numbering; $numbering++; ?>
              </th>
            <!-- season -->
              <td>
                      <?php echo $row["season"]; ?>
                    </td>
                    <!-- product -->
                    <td>
                      <?php echo $row["product"]; ?>
                    </td>
                    <!-- color -->
                    <td>
                      <?php echo $row["color"]; ?>
                    </td>
                    <!-- new stock -->
                    <td>
                      <?php echo $row["qty"]; ?>
                    </td>
                    <?php                  
                      $restock = mysqli_query($conn, "SELECT qty FROM stock WHERE product_code = '$code' AND status = 'restock'");
                      
                      $count_restock=1;
                      while($row_restock = mysqli_fetch_array($restock)) {
                    ?>
                    <!-- restock -->
                    <td>
                      <?php echo $row_restock["qty"];                        
                      ?>
                    </td>
                    <?php
                        $count_restock++;
                      } 
                    ?>
                    <?php                  
                      $sell = mysqli_query($conn, "SELECT qty FROM stock WHERE product_code = '$code' AND status = 'penjualan'");
                      
                      $count_sell=1;
                      while($row_sell = mysqli_fetch_array($sell)) {
                    ?>
                    <!-- penjualan -->
                    <td>
                      <?php echo "hello"; ?>
                    </td>
                    <?php
                        $count_sell++;
                      } 
                    ?>
                    <!-- sisa -->
                    <td>
                      <?php echo "hello"; ?>
                    </td>
                  </tr>
                  <?php
                  $count++;
                  }
                  ?>
                </tbody>                
              </table>
            </div> 
            </div>
        </main>     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
