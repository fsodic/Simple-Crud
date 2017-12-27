<?php
if(isset($_GET['id']) && is_numeric($_GET['id']) && $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->num_rows == 1)
{
$product = $connect->query("SELECT * FROM `product` WHERE `idproduct` = '".mysqli_real_escape_string($connect,$_GET['id'])."'")->fetch_object();
$title = 'Detail '.htmlentities($product->product_nama);
include ('./inc/header.php');
echo $notice.'

<table class="table table-bordered table-striped table-light table-hover">

<thead class="text-center">

<tr>

<th scope="col">Label</th>

<th scope="col" colspan="3">Rincian</th>

</tr>

</thead>

<tbody>

<tr>

<td class="text-center">Gambar</td>

<td class="text-center"><a href="#" data-toggle="img"><img src="'.$product->product_gambar.'" style="width:80px; height: 120px;" /></a></td>

</tr>

<tr>

<td class="text-center">Nama</td>

<td>'.htmlentities($product->product_nama).'</td>

</tr>

<tr>

<td class="text-center">Harga</td>

<td>Rp '.$product->product_harga.'</td>

</tr>

<tr>

<tr>

<td class="text-center">Berat</td>

<td>'.$product->product_berat.' gram</td>

</tr>

<tr>

<td class="text-center">Stok</td>

<td>'.$product->product_stock.'</td>

</tr>

<tr>

<td class="text-center">Tentang Produk</td>

<td>'.htmlentities($product->product_deskripsi).'</td>

</tr>
';
if(!empty($uLog->iduser))
{
echo '
<tr>

<td class="text-center">Admin</td>

<td>

<a title="Edit" class="btn btn-success" href="edit?id='.$product->idproduct.'"><span class="fa fa-edit"></span><span class="sr-only">Detail</span></a>

<a title="Hapus" class="btn btn-danger" href="delete?id='.$product->idproduct.'"><span class="fa fa-trash"></span><span class="sr-only">Detail</span></a>

</td>

</tr>
';
}
echo '
</tbody>

</table>

<div class="image-click"><a href="#" data-toggle="img"><img src="'.$product->product_gambar.'" /></a></div>
';
include ('./inc/footer.php');
}
else
{
header ('Location: index?not=not_found');
}