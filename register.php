<?php

@include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'Pengguna sudah ada!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'Password tidak cocok!';
      } else {
         $insert = "INSERT INTO user (name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <?php include "css/csslogin.php"; ?>
   <title>Register - Furious Garage</title>

</head>

<body>

   <div class="container_log">
      <form action="" method="post" class="form-log">
         <div class="text-center my-4">
            <h1 class="fs-4 mb-0"><strong>Furious Garage</strong></h1>
         </div>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="err_msg">' . $error . '</span>';
            };
         };
         ?>
         <label for="email">Username</label>
         <input type="text" name="name" required>
         <label for="email">Email Address</label>
         <input type="email" name="email" required>
         <label for="email">Password</label>
         <input type="password" name="password">
         <label for="email">Confirm password</label>
         <input type="password" name="cpassword">
         <select name="user_type">
            <option value="pemilikbengkel">pemilikbengkel</option>
            <option value="user">user</option>
         </select>
         <input type="submit" name="submit" value="Register" class="form-btn">
         <p>Sudah memiliki Akun? <a href="login.php">Login!</a></p>
      </form>

   </div>

</body>

</html>