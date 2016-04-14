<?php
session_start();

    if (isset($_COOKIE['username'])) {
    $_SESSION['name']=$_COOKIE['username'];
  }
    if (isset($_COOKIE['userlogin'])) {
    $_SESSION['login']=$_COOKIE['userlogin'];
  }


    if (isset($_COOKIE['msg'])) {
    $msg=$_COOKIE['msg'];
    setcookie('msg','try another login',time() - 60, '/');
  }

  require 'checkSession.php';

  if (isset($_POST['logout']))
  {
    session_unset();
    session_destroy();
    setcookie('username',$user['name'],time() - 864000 , '/');
    setcookie('userlogin',$user['login'],time() - 864000 , '/');
    header('Location: index.php');
  }
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="favicon.png" type="image/png">
  <meta http-equiv="Content-Type" Content="text/html; Charset=UTF-8">
  <link rel="stylesheet" type="text/css" href="main.css">
  <title>Notes online</title>
<script type="text/javascript" src="script.js"></script>
</head>
<body>
  <header>
  	<h1 class="title">Notes online</h1>
  	<img src="logo.png" class="logo">
    <div class="info">
    	<?php echo $login ?>
    </div>
  </header>
  <div class="main">
    <?php echo $main ?>
  </div>
</body>
</html>