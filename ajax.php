<?php
include "connection.php";

$season=$_GET["season"];
$product=$_GET["product"];

if($season!=""){
    $res=mysqli_query($conn, "SELECT product FROM new_stock WHERE season = '$season' GROUP BY product");
    echo "<select id='product' onChange='change_product()'>";
    echo "<option>"; echo "Select"; echo "</option>";
    while($row = mysqli_fetch_array($res)){        
        echo "<option value='$row[product]'>"; echo $row["product"]; echo "</option>";
    }
    echo "</select>";
}

if($product!=""){
    $res=mysqli_query($conn, "SELECT color FROM new_stock WHERE product = '$product' GROUP BY color") or die("Error: " . mysqli_error($conn));
    echo "<select id='color'>";
    echo "<option>"; echo "Select"; echo "</option>";
    while($row = mysqli_fetch_array($res)){    
        echo "<option value='$row[color]'>"; echo $row["color"]; echo "</option>";
    }
    echo "</select>";
}
?>