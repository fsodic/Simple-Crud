<?php
echo '<!DOCTYPE html>

<html>

<head>

<title>';
if(empty($title))
{
echo 'Beranda';
}
else
{
echo $title;
}
echo '</title>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1" />

<link rel="stylesheet" href="assets/css/font-awesome.min.css" media="all" type="text/css" />

<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="all" type="text/css" />

<link rel="stylesheet" href="assets/css/store.css" media="all" type="text/css" />

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-store">

<div class="container">

<a class="navbar-brand" href="index">Tokoku</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav mr-auto">

<li class="nav-item"><a class="nav-link" href="index">Home</a></li>
';
if(empty($uLog->iduser))
{
echo '
<li class="nav-item"><a class="nav-link" href="login">Login</a></li>
';
}
else
{
echo '
<li class="nav-item"><a class="nav-link" href="create">Tambah</a></li>

<li class="nav-item"><a class="nav-link" href="logout">Keluar</a></li>
';
}
echo '
</ul>

<form class="form-inline my-2 my-lg-0" action="index" method="GET">

<input class="form-control mr-sm-2" name="q" type="search" placeholder="Search" aria-label="Search">

<button class="btn my-2 my-sm-0 btn-search" type="submit"><span class="fa fa-search"></span><span class="sr-only">Search</span></button>

</form>

</div>

</div>
 
</nav>

<main id="main" role="main" class="pb-3 pt-3 bg-light">

<div class="container">
';
