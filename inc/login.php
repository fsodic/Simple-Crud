<?php
if(isset($_POST['login']))
{
$username = isset($_POST['username']) ? trim($_POST['username']) :'';
$password = isset($_POST['password']) ? trim($_POST['password']) :'';

$username = trim($username);
$password = md5($password);
if(empty($username) || empty($password))
{
$notice .= '<div class="alert alert-danger">Harap lengkapi form</div>';
}
else
{
$userScan = $connect->query("SELECT * FROM `user` WHERE `username` = '".mysqli_real_escape_string($connect,$username)."'");
if($userScan->num_rows == 0)
{
$notice .= '<div class="alert alert-danger">Data tidak ada</div>';
}
else
{
$user = $userScan->fetch_object();
if(md5($user->password) == $password)
{
setcookie('username', $user->username, time()+3600*24*30, '/', $cookieDomain);
setcookie('password', $user->password, time()+3600*24*30, '/', $cookieDomain);
header ('Location: index');
}
else
{
$notice .= '<div class="alert alert-danger">Password salah</div>';
}
}
}
}
$title = 'Login';
include ('./inc/header.php');
echo '
<form class="form-signin" method="POST" action="login">
'.$notice.'
<h2 class="form-signin-heading">Form Login</h2>

<label for="inputUsername" class="sr-only">Username</label>

<input type="text" id="inputEmail" class="form-control" name="username" placeholder="Username" required autofocus>

<label for="inputPassword" class="sr-only">Password</label>

<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>

<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>

</form>
';
include ('./inc/footer.php');