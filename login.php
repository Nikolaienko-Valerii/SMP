<?php
  $msg=false;
  $mongo = new MongoClient();
  $profiles = $mongo->notekeeper->profiles;
  $user = $profiles->findOne(array('login' => $_POST['login']));
   if ($user!=null && md5($_POST['password']) == $user['password'])
   {
    $_SESSION['name'] = $user['name'];
    $_SESSION['login'] = $user['login'];
    setcookie('username',$user['name'],time() + 864000 , '/');
    setcookie('userlogin',$user['login'],time() + 864000 , '/');
   }
   else
   {
    setcookie('msg','try another login',0, '/');
   }
   $mongo->close();
   unset($mongo);
   header('Location: index.php');
?>