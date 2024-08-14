<a href="<?php echo "?p=kategori"; ?>"><button type="button" class='btn btn-add'>KATEGORI</button></a> &raquo; 
<button type="button" class='btn btn-dis'>Tambah Kategori</button>
<br>
<div class="card">
<div class="kepalacard">Tambah Kategori</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="namakat" type="text" id="namakat" placeholder="Nama Kategori">
    <textarea name="ketkat" id="ketkat" placeholder="Keterangan Kategori"></textarea>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN KATEGORI">
  </form>

<?php
if($_POST["simpan"]){
  if(!empty($_POST["namakat"]) and !empty($_POST["ketkat"])){
    $sqlk = mysqli_query($kon, "insert into kategori (idadmin, namakat, ketkat, tglkat) values ('$ra[idadmin]', '$_POST[namakat]', '$_POST[ketkat]', NOW())");
	  
	if($sqlk){
	  echo "Kategori Berhasil Disimpan";
	}else{
  	  echo "Gagal Menyimpan";
	}
	  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
  }else{
    echo "Data harus diisi dengan lengkap !!!";
  }
}
?>
</div>
</div>