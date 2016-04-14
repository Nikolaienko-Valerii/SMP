<?php
session_start();
	if ($_POST['password']==$_POST['rpassword'] && strlen($_POST['password'])>=6)
    {
        $mongo = new MongoClient();
        $notekeeper = $mongo->notekeeper;
        $profiles = $notekeeper->profiles;
        $user = $profiles->findOne(array('login' => $_POST['login']));
        if ($user==null)
        {
          $user = array('name' => $_POST['name'], 'login' => $_POST['login'], 'password' => md5($_POST['password']), 'email' => $_POST['email']);
          $profiles->insert($user);
          $collection = $notekeeper->createCollection($user['login']);
          setcookie('username',$_POST['name'],time() + 864000 , '/');
          setcookie('userlogin',$_POST['login'],time() + 864000 , '/');
          $_SESSION['name']=$user['name'];
          $_SESSION['login']=$user['login'];
          header('Location: index.php');
        }
        else
        {
          setcookie('msg','Login already taken',0, '/');
          header('Location: register.php');
        }
        $mongo->close();
        unset($mongo);
    }
    else
    {
        setcookie('msg','too short password or passwords not match',0, '/');
        header('Location: register.php');
    }
?>