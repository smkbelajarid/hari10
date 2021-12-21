<?php 
 
require '../functions/functions.php';
 
// error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}
 
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman login</title>
</head>
<body>

<?php if(isset ($error)) : ?>
  <p style="font-style: italic; color:red;">username dan paswword salah</p>
  <?php endif ; ?>
  

  
<h1>halaman login admin</h1>
<form action="" method="post">
  <ul>
    <li>
      <label for="username">User Name :</label>
      <input type="text" name="username" id="username" autocomplete="off">
    </li>
    <li>
      <label for="username">Password :</label>
      <input type="password" name="password" id="password" autocomplete="off">
    </li>
    <li>
      <button type="submit" name="login">Login</button>
    </li>
  </ul>
</form>


</body>
</html>