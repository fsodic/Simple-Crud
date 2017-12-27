<?php
/*
-------------
Source code Simple CRUD by PojokCoding.co.id
-------------
*/

session_start();
date_default_timezone_set('UTC');
$notice = '';
include ('./inc/connect.php');

if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && $connect->query("SELECT * FROM `user` WHERE `username` = '".mysqli_real_escape_string($connect,$_COOKIE['username'])."' AND `password` = '".mysqli_real_escape_string($connect,$_COOKIE['password'])."'")->num_rows == 1)
{
$uLog = $connect->query("SELECT * FROM `user` WHERE `username` = '".mysqli_real_escape_string($connect,$_COOKIE['username'])."' AND `password` = '".mysqli_real_escape_string($connect,$_COOKIE['password'])."'")->fetch_object();
}

if(isset($_GET['create']))
{
if(empty($uLog->iduser))
{
header ('Location: login');
exit;
}
else
{
include ('./inc/create.php');
}
}
else if(isset($_GET['edit']))
{
if(empty($uLog->iduser))
{
header ('Location: login');
exit;
}
else
{
include ('./inc/edit.php');
}
}
else if(isset($_GET['delete']))
{
if(empty($uLog->iduser))
{
header ('Location: login');
exit;
}
else
{
include ('./inc/delete.php');
}
}
else if(isset($_GET['detail']))
{
include ('./inc/detail.php');
}
else if(isset($_GET['login']))
{
if(empty($uLog->iduser))
{
include ('./inc/login.php');
}
else
{
header ('Location: index');
exit;
}
}
else
{
include ('./inc/index.php');
}