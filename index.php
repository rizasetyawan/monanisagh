<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 offset-sm-3">
          <div class="card bg-light">
            <div class="card-header">Form Input</div>
            <div class="card-body">
              <form method="post" action="insert.php">
                <div class="form-group row">
                  <label for="season" class="col-sm-3 col-form-label">Season</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="season" name="season" placeholder="Season">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Sesion1" class="col-sm-3 col-form-label">Sesion 1</label>
                  <div class="col-sm-9">
                    <select class="form-control" id="Sesion1" name="season">
                      <option>1</option>
                      <option>2</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="product" class="col-sm-3 col-form-label">Product</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="product" name="product" placeholder="Product">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="color" class="col-sm-3 col-form-label">Color</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="color" name="color" placeholder="Color">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="status" class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="qty" class="col-sm-3 col-form-label">Qty</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="qty" name="qty" placeholder="Qty">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="productcode" class="col-sm-3 col-form-label">Product Code</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="productcode" name="productcode" placeholder="Product Code">
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
      <div class="row">
        <div class="col-sm-12">
          <div class="card text-center">
            <div class="card-header">
              Featured
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
                  include "connection.php";
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
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
