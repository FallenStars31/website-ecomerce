<?php
if(empty($_SESSION["userag"]) and empty($_SESSION["passag"])){
  echo "<p><div align='center'>Sebelum membeli produk kami, Anda harus login terlebih dahulu</div><p>";
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=login'>";
}else{
  $sqlc = mysqli_query($kon, "select idproduk from cart where idproduk='$_GET[idp]'");
  $rowc = mysqli_num_rows($sqlc);
  
  $sqlp = mysqli_query($kon, "select * from produk where idproduk='$_GET[idp]'");
  $rp = mysqli_fetch_array($sqlp);
  if($rowc == 0){
	mysqli_query($kon, "insert into cart (idproduk, iduser, jumlahbeli, tglcart) 
  values ('$_GET[idp]', '$rag[iduser]', 1, NOW())");
  }else{
    $sqlcr = mysqli_query($kon, "select * from cart where idproduk='$_GET[idp]'");
	$rcr = mysqli_fetch_array($sqlcr);
	  mysqli_query($kon, "update cart set jumlahbeli=jumlahbeli+1 where idproduk='$_GET[idp]' and iduser='$_GET[idag]'");
	}
  }

 echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=keranjangbelanja&idag=$rag[iduser]'>";
?>