<?php
if(isset($_POST['tambah']))
{
if(isset($_POST['product_nama']))
{
$product_nama = trim($_POST['product_nama']);

if(empty($product_nama))
{
$notice .= '<div class="alert alert-danger">Masukan nama produk</div>';
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan nama produk</div>';
}

if(isset($_POST['product_berat']))
{
$product_berat = trim($_POST['product_berat']);

if(empty($product_berat))
{
$notice .= '<div class="alert alert-danger">Masukan nama produk</div>';
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan berat produk</div>';
}

if(isset($_POST['product_deskripsi']))
{
$product_deskripsi = trim($_POST['product_deskripsi']);

if(empty($product_deskripsi))
{
$notice .= '<div class="alert alert-danger">Masukan deskripsi produk</div>';
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan deskripsi produk</div>';
}

if(isset($_POST['product_harga']))
{
$product_harga = trim($_POST['product_harga']);

if(empty($product_harga))
{
$notice .= '<div class="alert alert-danger">Masukan harga produk</div>';
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan harga produk</div>';
}

if(isset($_POST['product_stock']))
{
$product_stock = trim($_POST['product_stock']);

if(!is_numeric($_POST['product_stock']))
{
$notice .= '<div class="alert alert-danger">Masukan stok produk</div>';
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan stok produk</div>';
}

if(isset($_FILES['media']))
{
$extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
$name = md5(time().'-'.$_FILES['media']['name']).'.'.$extension;
$product_gambar = './assets/img/product/'.$name;
copy($_FILES['media']['tmp_name'],$product_gambar);
}
else
{
$notice .= '<div class="alert alert-danger">Masukan gambar produk</div>';
}

if(empty($notice))
{
$connect->query("INSERT INTO `product`(`product_nama`, `product_berat`, `product_deskripsi`, `product_harga`, `product_stock`, `product_gambar`) VALUES('".mysqli_real_escape_string($connect,$product_nama)."', '".mysqli_real_escape_string($connect,$product_berat)."', '".mysqli_real_escape_string($connect,$product_deskripsi)."', '".mysqli_real_escape_string($connect,$product_harga)."', '".mysqli_real_escape_string($connect,$product_stock)."', '".mysqli_real_escape_string($connect,$product_gambar)."')");
header ('Location: create?not=added');
exit;
}
}
if(isset($_GET['not']))
{
if($_GET['not'] == 'added')
{
$notice .= '<div class="alert alert-success">Produk ditambahkan</div>';
}
}
$title = 'Tambah produk';
include ('./inc/header.php');
echo '
'.$notice.'
<form action="create" method="POST" enctype="multipart/form-data" class="bg-white pb-2 pt-2 pl-2 pr-2">

<div class="form-group">

<label>Nama Produk</label>

<div class="input-group">

<input type="text" name="product_nama" class="form-control" required />

</div>

<label>Berat (gram)</label>

<div class="input-group">

<span class="input-group-addon" id="basic-addon1">g</span>

<input type="number" name="product_berat" class="form-control" required />

</div>

<label>Deskripsi</label>

<div class="input-group">

<textarea name="product_deskripsi" class="form-control" required></textarea>

</div>

<label>Harga</label>

<div class="input-group">

<span class="input-group-addon" id="basic-addon1">Rp</span>

<input name="product_harga" class="form-control" type="number" required />

</div>

<label>Stok</label>

<input type="number" name="product_stock" class="form-control" required />

<label>Gambar</label>

<input type="file" id="media" name="media" class="form-control" required />

<button class="btn btn-primary mt-3" type="submit" name="tambah">Tambah</button>

</div>

</form>
';
include ('./inc/footer.php');