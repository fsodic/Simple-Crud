<?php
if(isset($_GET['id']) && is_numeric($_GET['id']) && $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->num_rows == 1)
{
$product = $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->fetch_object();
$product_nama = $product->product_nama;
$product_berat = $product->product_berat;
$product_deskripsi = $product->product_deskripsi;
$product_harga = $product->product_harga;
$product_stock = $product->product_stock;

if(isset($_POST['edit']))
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
$notice .= '<div class="alert alert-danger">Masukan berat produk</div>';
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
if($_FILES['media']['name'] == '')
{
$product_gambar = $product_gambar;
}
else
{
$extension = pathinfo($_FILES['media']['name'], PATHINFO_EXTENSION);
$name = md5(time().'-'.$_FILES['media']['name']).'.'.$extension;
$product_gambar = './assets/img/product/'.$name;

if(file_exists($product->product_gambar))
{
unlink($product->product_gambar);
}
copy($_FILES['media']['tmp_name'],$product_gambar);
$connect->query("UPDATE `product` SET `product_gambar` = '".$product_gambar."' WHERE `idproduct` = '".$product->idproduct."'");
}
}
else
{
$notice .= '<div class="alert alert-danger">Masukan gambar produk</div>';
}

if(empty($notice))
{
$connect->query("UPDATE `product` SET `product_nama` = '".mysqli_real_escape_string($connect,$product_nama)."', `product_berat` = '".mysqli_real_escape_string($connect,$product_berat)."', `product_deskripsi` = '".mysqli_real_escape_string($connect,$product_deskripsi)."', `product_harga` = '".mysqli_real_escape_string($connect,$product_harga)."', `product_stock` = '".mysqli_real_escape_string($connect,$product_stock)."' WHERE `idproduct` = '".$product->idproduct."'");
header ('Location: index?not=saved');
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
$title = 'Edit';
include ('./inc/header.php');
echo '
'.$notice.'
<form action="edit?id='.$product->idproduct.'" method="POST" enctype="multipart/form-data" class="bg-white pb-2 pt-2 pl-2 pr-2">

<div class="form-group">

<label>Nama Produk</label>

<div class="input-group">

<input type="text" name="product_nama" class="form-control" value="'.htmlentities($product_nama).'" required />

</div>

<label>Berat (gram)</label>

<div class="input-group">

<span class="input-group-addon" id="basic-addon1">g</span>

<input type="number" name="product_berat" class="form-control" value="'.htmlentities($product_berat).'" required />

</div>

<label>Deskripsi</label>

<div class="input-group">

<textarea name="product_deskripsi" class="form-control" required>'.htmlentities($product_deskripsi).'</textarea>

</div>

<label>Harga</label>

<div class="input-group">

<span class="input-group-addon" id="basic-addon1">Rp</span>

<input name="product_harga" class="form-control" type="number" value="'.htmlentities($product_harga).'" required />

</div>

<label>Stok</label>

<div class="input-group">

<input type="number" name="product_stock" class="form-control" value="'.htmlentities($product_stock).'" required />

</div>

<label>Gambar</label>

<div class="input-group">

<input type="file" id="media" name="media" class="form-control" />

</div>

<button class="btn btn-primary mt-3" type="submit" name="edit">Simpan</button>

</div>

</form>
';
include ('./inc/footer.php');
}
else
{
header ('Location: index?not=not_found');
}