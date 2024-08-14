<?php
$sqlag = mysqli_query($kon, "delete from user where idanggota='$_GET[idag]'");

if($sqlag){
  echo "Anggota Berhasil Dihapus";
}else{
  echo "Gagal Menghapus";
}
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=anggota'>";
?>