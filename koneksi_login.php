<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();

include ("connection.php");

$login = mysqli_query($conn, "select * from admin where
(nama = '" . $_POST['username'] . "') and
(password = '" . $_POST['password'] . "') ");
$rowcount = mysqli_num_rows($login);

if ($rowcount == 1){
    $data = mysqli_fetch_assoc($login);
    $_SESSION['username'] = $_POST['username'];
    setcookie($username);

    $_SESSION['login']='true';
    header("location: dashboard.php");
}else{
    echo("<script>alert('Username or Password Incorrect!');window.location.href='login.php';</script>");
}

?>
