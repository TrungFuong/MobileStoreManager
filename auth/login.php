<?php
session_start();
if (isset($_SESSION['isLoginSuccess']) == true && $_SESSION['isLoginSuccess'] == true) {
  header("location:../admin/adminPage.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DWG Store</title>
  <link rel="stylesheet" href="../css/login.css" />
</head>

<body>
  <div class="center">
    <h1>Login</h1>
    <form method="post" action="loginProcess.php">
      <div class="txt_field">
        <input type="text" name='name' required />
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name='PASSWORD' required />
        <span></span>
        <label>Password</label>
      </div>
      <div class="password" style="color: red"><u>Forgot Password?</u></div>
      <input type="submit" name='submit' value="Login" />
      <div class="signup_link">
        <a href="#"><u>Sign up</u></a>
      </div>
    </form>
  </div>
</body>

</html>