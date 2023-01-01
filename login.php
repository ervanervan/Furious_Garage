<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'pemilikbengkel') {
         $_SESSION['pemilikbengkel_name'] = $row['name'];
         header('location:bengkel_page.php');
      } elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      }
   } else {
      $error[] = 'Email atau password salah!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "css/csslogin.php"; ?>
   <title>Login - Furious Garage</title>

</head>

<body>
   <div class="container_log">
      <form method="post" class="form-log">
         <div class="text-center my-4">
            <h1 class="fs-4 mb-0"><strong>Furious Garage</strong></h1>
         </div>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="err-msg">' . $error . '</span>';
            };
         };
         ?>
         <label for="email">Email Address</label>
         <input type="email" name="email" required>
         <label for="password">Password</label>
         <input type="password" name="password" required>
         <input type="submit" name="submit" value="Login" class="form-btn">
         <p>Belum memiliki Akun? <a href="register.php">Register!</a></p>
      </form>
   </div>

</body>

</html>