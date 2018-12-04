<?php
  include "connection.php";

  $select = "SELECT id, created_date, season, product, color, status, qty, created_by, product_code FROM stock";
  $result = mysqli_query($conn, $select);

  if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      }
  } else {
      echo "0 results";
  }
  $conn->close();
?>
