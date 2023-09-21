<?php
session_start();
// echo "<pre>";
//     print_r($_SESSION);
// echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
</head>
<body>
<div class="container">  
  <form id="contact" action="./controler/login.php" method="post">
    <h3>Login Form</h3>
   
      <input placeholder="Enter Your name" type="text" name="name" required autofocus>
      <?php
        echo isset($_SESSION['name_error'])? $_SESSION['name_error']:"";
      ?>
      <input placeholder="Enter Your Email Address" type="email" name="email" required>
      <?php
       echo isset($_SESSION['email_error'])? $_SESSION['email_error']:"";
      ?>

      <input placeholder="Enter Your Phone Number " type="number" name="phone" required>
      <?php
        echo isset($_SESSION['phone_error'])? $_SESSION['phone_error']:"";
      ?>

      <input placeholder="Enter a password" type="password" name="pass" required>
      <?php
        echo isset($_SESSION['pass_error'])? $_SESSION['pass_error']:"";
      ?>

      <input placeholder="Confrim your password" type="password" name="cpass" required>
  
      <button name="submit" type="submit" >login</button>
  </form>
  <?php
  session_unset();
  ?>
</div>

</body>
</html>


