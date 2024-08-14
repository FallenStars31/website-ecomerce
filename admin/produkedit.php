<?php
$sqlp= mysqli_query($kon, "select * from produk where idproduk='$_GET[id]'");
$rp = mysqli_fetch_array($sqlp);
?>
<a href="<?php echo "?p=produk"; ?>"><button type="button" class="btn btn-add">PRODUK</button></a>
<button type="button" class="btn btn-add-dis">Ubah Produk</button>
<br>   
<div class="card">
<div class="kepalacard">Ubah Produk</div>
<div class="isicard" style="text-align:center;">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <input name="idproduk" type="hidden" value="<?php echo "$rp[idproduk]"; ?>" />
  <?php
  $sqlk = mysqli_query($kon, "select * from kategori where idkat='$rp[idkat]'");
  $rk = mysqli_fetch_array($sqlk);
  ?>
  <input name="namakat" type="text" disabled value="<?php echo "$rk[namakat]"; ?>" />
  <input name="namaproduk" type="text" id="namaproduk" placeholder="Nama Produk" value="<?php echo "$rp[namaproduk]"; ?>">
  <input name="harga" type="text" id="harga" placeholder="Harga Produk (dalam Rp.)" value="<?php echo "$rp[harga]"; ?>">
  <input name="stok" type="text" id="stok" placeholder="Stok Produk" value="<?php echo "$rp[stok]"; ?>">
  <textarea name="detailproduk" id="detailproduk" placeholder="Detail Produk"><?php echo "$rp[detailproduk]"; ?></textarea>
  <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk(dalam %)" value="<?php echo "$rp[diskon]"; ?>">
  <input name="berat" type="text" id="berat" placeholder="Berat Produk(dalam Kg)" value="<?php echo "$rp[berat]"; ?>">
  <p><img src="<?php echo "../fotoproduk/$rp[foto]"; ?>" height="200px">
  <input name="foto" type="file" id="foto">
  <input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
</form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["namaproduk"]) and !empty($_POST["harga"]) and !empty($_POST["stok"]) and !empty ($_POST["detailproduk"]) and !empty($_POST["berat"])){
    $nmfoto = $_FILES["foto"]["name"];
	$lokfoto = $_FILES["foto"]["tmp_name"];
	if(!empty($lokfoto)){
	  move_uploaded_file($lokfoto, "../fotoproduk/$nmfoto");
	  $foto = ", foto='$nmfoto'";
	}else{
	  $foto ="";
	}
	
	$sqlp = mysqli_query($kon, "update produk set namaproduk='$_POST[namaproduk]', harga='$_POST[harga]', stok='$_POST[stok]', detailproduk='$_POST[detailproduk]', diskon='$_POST[diskon]', berat='$_POST[berat]' $foto where idproduk='$_POST[idproduk]'");
	
	if($sqlp){
	  echo "Perubahan Produk Berhasil Disimpan";
	}else{
	  echo "Gagal Menyimpan";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=produk'>";
	}else{
	  echo "Data harus diisi dengan lengkap !!!";
	}
	}
	?>
</div>
</div>