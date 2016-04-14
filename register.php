<?php
  if (isset($_COOKIE['user'])) {
    header('Location: index.php');
  }

  if (isset($_COOKIE['msg'])) {
    $msg=$_COOKIE['msg'];
    setcookie('msg','try another login',time() - 60, '/');
  }
?>
<html>
<head>
  <link rel="shortcut icon" href="logo.png" type="image/png">
  <meta http-equiv="Content-Type" Content="text/html; Charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="main.css">
  <title>Notes online - registration</title>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
  <header>
  	<h1 class="title">Notes online</h1>
  	<img src="logo.png" class="logo">
  </header>
  <div class="main">
    <div class="register">
      <p class="registerMsg">Please complete all fields</p>
      <form method="post" class="registerForm" action="newUser.php">
      <table class="registerContainer">
      <tr><td>Name</td><td colspan="2" style="text-align:right;"><input type="text" name="name" required autocomplete="off" autofocus placeholder="Name"></td></tr>
        <tr><td>Login</td><td colspan="2" style="text-align:right;"><input type="text" name="login" required autocomplete="off" onkeyup="DeleteError()" placeholder="Login"></td><td><span class="error" id="logerror"><?php echo $msg ?></span></td></tr>
        <tr><td>Password</td><td colspan="2" style="text-align:right;"><input type="password" name="password" autocomplete="off" required id="pass1" onkeyup="ClearPass(); CheckLength()" placeholder="Password"></td><td><span id="passerror1" class="error">Password is too short</span></td></tr>
        <tr><td>Repeat Password</td><td colspan="2" style="text-align:right;"><input type="password" name="rpassword" autocomplete="off" required onkeyup="CheckPass()" id="pass2" placeholder="Password"></td><td><span id="passerror2" class="error">Passwords not match</span></td></tr>
        <tr><td>E-mail</td><td colspan="2" style="text-align:right;"><input type="email" name="email" required autocomplete="off" placeholder="example@somemail.com"></td></tr>
        <tr><td colspan="4" style="text-align:center;"><button disabled="true" type="submit" name = "register" id="register">Register</button></td></tr>
        <tr><td></td></tr>
        <tr><td></td></tr>
      </table>
      </form>
    </div>
  </div>
</body>
</html>
