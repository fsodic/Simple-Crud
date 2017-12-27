<?php
$connect = new mysqli('localhost', 'root', '', 'db_store'); // urutan host, user, password, database
$cookieDomain = 'localhost'; //ganti dengan domain diawali dengan tanda titik (.) apabila menggunakan domain (e.g .fsodic.com)

if(mysqli_errno($connect))
{
echo 'Edit file inc/connect.php dan kopi file table.sql ke phpmyadmin';
exit;
}