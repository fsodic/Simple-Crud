<?php
if(isset($_GET['not']))
{
if($_GET['not'] == 'not_found')
{
$notice .= '<div class="alert alert-danger">Produk tidak ada</div>';
}
else if($_GET['not'] == 'saved')
{
$notice .= '<div class="alert alert-success">Produk disimpan</div>';
}
else if($_GET['not'] == 'deleted')
{
$notice .= '<div class="alert alert-success">Produk dihapus</div>';
}
else if($_GET['not'] == 'added')
{
$notice .= '<div class="alert alert-success">Produk ditambah</div>';
}
}
else if(isset($_GET['q']))
{
$notice .= '<div class="alert alert-info">Pencarian <b>'.htmlentities($_GET['q']).'</b></div>';
}

include ('./inc/header.php');
echo $notice.'

<table class="table table-bordered table-striped table-light table-hover">

<thead class="text-center">

<tr>

<th scope="col">No</th>

<th scope="col">Gambar</th>

<th scope="col">Nama</th>

<th scope="col">Harga</th>

<th scope="col">Detail</th>

</tr>

</thead>

<tbody>

<tr>
';
if(isset($_GET['q']))
{
$productScan = $connect->query("SELECT * FROM `product` WHERE `product_nama` LIKE '%".mysqli_real_escape_string($connect,$_GET['q'])."%' ORDER BY `idproduct` DESC");
}
else
{
$productScan = $connect->query("SELECT * FROM `product` ORDER BY `idproduct` DESC");
}
if($productScan->num_rows == 0)
{
echo '
<td colspan="5"><div class="alert alert-info">Produk kosong</th>
';
}
else
{
$no=0;
while($product = $productScan->fetch_object())
{
$no++;
echo '
<td class="text-center">'.$no.'</td>

<td class="text-center"><img src="'.$product->product_gambar.'" style="width:40px; height: 60px;" /></td>

<td>'.htmlentities($product->product_nama).'</td>

<td>Rp '.$product->product_harga.'</td>

<td class="text-center">

<a title="Detail" class="btn btn-primary" href="detail?id='.$product->idproduct.'"><span class="fa fa-eye"></span><span class="sr-only">Detail</span></a>
';
if(!empty($uLog->iduser))
{
echo '
<a title="Edit" class="btn btn-success" href="edit?id='.$product->idproduct.'"><span class="fa fa-edit"></span><span class="sr-only">Detail</span></a>

<a title="Hapus" class="btn btn-danger" href="delete?id='.$product->idproduct.'"><span class="fa fa-trash"></span><span class="sr-only">Detail</span></a>
';
}
echo '
</td>
';
}
}
echo '
</tr>

</tbody>

</table>
';
include ('./inc/footer.php');