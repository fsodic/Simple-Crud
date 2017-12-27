<?php
if(isset($_GET['id']) && is_numeric($_GET['id']) && $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->num_rows == 1)
{
$product = $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->fetch_object();

if(isset($_POST['yes']))
{
$connect->query("DELETE FROM `product` WHERE `idproduct` = '".$product->idproduct."'");
header ('Location: index?not=deleted');
exit;
}
$title = 'Hapus';
include ('./inc/header.php');
echo '
<form action="delete?id='.$product->idproduct.'" method="POST" enctype="multipart/form-data" class="bg-white pb-2 pt-2 pl-2 pr-2">

<label>Konfirmasi</label>

<div class="alert alert-warning">Kamu yakin ingin menghapus '.htmlentities($product->product_nama).'?</div>

<button type="submit" name="yes" class="btn btn-primary mt-2">Ya</button>

<a href="index" class="btn btn-link mt-2" role="button">Batal</a>

</form>
';
include ('./inc/footer.php');
}
else
{
header ('Location: index?not=not_found');
}