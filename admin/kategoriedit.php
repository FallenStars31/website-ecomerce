<?php
$sqlk = mysqli_query($kon, "select * from kategori where idkat='$_GET[id]'");
$rk = mysqli_fetch_array($sqlk);
?>
<a href="<?php echo "?p=kategori"; ?>"><button type="button" class='btn btn-add'>KATEGORI</button></a> &raquo; 
<button type="button" class='btn btn-dis'>Ubah Kategori</button>
<div class="card">
<div class="kepalacard">Ubah Kategori</div>
<div class="isicard" style="text-align:center;">
  <form name="form1" method="post" action="" enctype="multipart/form-data">
    <input name="idkat" type="hidden" id="idkat" value="<?php echo "$rk[idkat]"; ?>">
    <input name="namakat" type="text" id="namakat" value="<?php echo "$rk[namakat]"; ?>" placeholder="Nama Kategori">
    <textarea name="ketkat" id="ketkat" placeholder="Keterangan Kategori"><?php echo "$rk[ketkat]"; ?></textarea>
    <input name="simpan" type="submit" id="simpan" value="SIMPAN PERUBAHAN KATEGORI">
  </form>

<?php
if($_POST["simpan"]){
  $sqlk = mysqli_query($kon, "update kategori set namakat='$_POST[namakat]', ketkat='$_POST[ketkat]' where idkat='$_POST[idkat]'");
  
  if($sqlk){
    echo "Perubahan Kategori Berhasil Disimpan";
  }else{
    echo "Gagal Menyimpan";
  }
  echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=kategori'>";
}
?>
</div>
</div>