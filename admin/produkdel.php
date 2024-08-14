<?php
$sqlp = mysqli_query($kon, "delete from produk where idproduk='$_GET[id]'");

if($sqlp){
  echo "Produk Berhasil Dihapus";
}else{
  echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
?>