<?php
	  if (isset($_SESSION['name']))
  {
  	$name = $_SESSION['name'];
    $login = '<span id="userLogin">'.$name.'</span><div id="userImg">'.strtoupper($name{0}).'</div>
    <form method = "post">
    <button type="submit" name="logout" style="margin-top:20px;">Logout</button>
    </form>';
    $mongo = new MongoClient();
    $user = $_SESSION['login'];
    $notes = $mongo->notekeeper->$user;
    $cursor = $notes->find();
    $main = '<div class="createNote">
      <div class="createForm">
        <form action="createNote.php" method="POST">
          <input type="text" placeholder="Type your header..." name="header" class="note noteHeader" autocomplete="off"><br>
          <textarea placeholder="Type your note..." name="note" class="note noteText" autocomplete="off" rows="7"></textarea>
          <button type="submit">Add note</button>
        </form>
      </div>
    </div>
    <div class="displayNotes">';
    foreach ($cursor as $doc => $value) {
      $header = $value['header'];
      $note = $value['note'];
      $id = $value['_id'];
      $main = $main.'<div class="userNote"><input type="text" class="readyNote noteHeader" disabled value="'.$header.'"><br><textarea name="note" class="readyNote noteText" disabled rows="12">'.$note.'</textarea><div name="noteId" style="display:none;">'.$id.'</div></div>';
    }
    $main = $main.'</div>';
  }
  else
  {
  	if ($msg)
  	{
      $visibility = '';
    }
  	else
  	{
      $visibility = 'visibility:hidden;';
    }
  		$main = '<div class="login">
      	<p class="loginMsg">Please login to continue</p>
      	<form method="post" class="loginForm" action="login.php">
        <table class="loginContainer">
          <tr><td>Login</td><td colspan="2" style="text-align:right;"><input type="text" name="login" required placeholder="Login" autocomplete="off" autofocus></td></tr>
          <tr><td>Password</td><td colspan="2" style="text-align:right;"><input  type="password" name="password" required placeholder="Password" autocomplete="off"></td></tr>
          <tr><td style="color:red; font-weight:bold; '.$visibility.'" colspan="3">Wrong login or password</td></tr>
          <tr><td colspan="3" style="text-align:center;"><button type="submit" name="enter" class="loginButton">Login</button></td></tr>
          <tr><td  colspan="3">Don'."'".'t have an account?</td></tr>
          <tr><td  colspan="3" style="text-align:right;"><a href="register.php">Then register now!</a></td></tr>
        </table>
      	</form>
      </div>';
      $login = '';
  }
?>