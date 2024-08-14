<a href="<?php echo "?p=produk"; ?>"><button type="button" class='btn btn-add'>PRODUK</button></a> &raquo; 
<button type="button" class='btn btn-dis'>Tambah Produk</button>
<br>
<div class="card">
<div class="kepalacard">Tambah Produk</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
  <?php
  $sqlk = mysqli_query($kon, "select * from kategori order by namakat asc");
  echo "<select name='idkat'>";
  echo "<option value=''>Kategori</option>";
  while($rk = mysqli_fetch_array($sqlk)){
  	echo "<option value='$rk[idkat]'>$rk[namakat]</option>";
  }
  echo "</select>";
  ?>
    <input name="namaproduk" type="text" id="namaproduk" placeholder="Nama Produk">
	<input name="harga" type="text" id="harga" placeholder="Harga Barang Produk (dalam Rp.)">
	<input name="stok" type="text" id="stok" placeholder="Stok Produk">
	<textarea name="detailproduk" id="detailproduk" placeholder="Detail Produk"></textarea>
    <input name="diskon" type="text" id="diskon" placeholder="Diskon Produk (dalam %)">
	<input name="berat" type="text" id="berat" placeholder="Berat Produk (dalam Kg)">
	<input name="foto" type="file" id="foto">
	<input name="simpan" type="submit" id="simpan" value="SIMPAN PRODUK">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["idkat"]) and !empty($_POST["namaproduk"])and !empty($_POST["harga"])and !empty($_POST["stok"])and !empty($_POST["detailproduk"])and !empty($_POST["berat"])){
  	$nmfoto = $_FILES["foto"]["name"];
	$lokfoto = $_FILES["foto"]["tmp_name"];
	if(!empty($lokfoto)){
	  move_uploaded_file($lokfoto, "../fotoproduk/$nmfoto");
	}
	
	
	$detail = nl2br($_POST["detailproduk"]);
    $sqlp = mysqli_query($kon, "insert into produk (idkat, idadmin, namaproduk, harga, stok, detailproduk, diskon, berat, foto, tglproduk) values ('$_POST[idkat]', '$ra[idadmin]', '$_POST[namaproduk]', '$_POST[harga]', '$_POST[stok]', '$detail', '$_POST[diskon]', '$_POST[berat]', '$nmfoto', NOW())");
	  
	if($sqlp){
	  echo "Produk Berhasil Disimpan";
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