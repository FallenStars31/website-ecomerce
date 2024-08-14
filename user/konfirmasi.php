<?php
$sqlo = mysqli_query($kon, "select * from orders where idorder='$_GET[id]'");
$ro = mysqli_fetch_array($sqlo);
// $sqlbyr = mysqli_query($kon, "select * from pembayaran where idorder='$ro[idorder]'");
// $rbyr = mysqli_fetch_array($sqlbyr);
// $rowbyr = mysqli_num_rows($sqlbyr);
$sqlag = mysqli_query($kon, "select * from user where iduser='$ro[iduser]'");
$rag = mysqli_fetch_array($sqlag);
$total = number_format($ro["total"]);
// $jmltrs = number_format($rbyr["jumlahtransfer"]);
?>
<div class="card">
<div class="kepalacard" text-align="center">Konfirmasi Pembayaran</div>
<div class="isicard" style="text-align:center">
<form method="get" action="" enctype="multipart/form-data">
<div class="dh12">
<input type="hidden" name="p" value="<?php echo "$ro[tglorder]"; ?>">
<input type="hidden" name="idag" value="<?php echo "$rag[iduser]"; ?>">
<input type="text" name="noorder" placeholder="Masukkan No Order (Tanpa #)" value="<?php echo "$ro[noorder]"; ?>">
</div>
</form>
<form id="form2" name="form2" method="post" action="" enctype="multipart/form-data">
<input name="idorder" type="hidden" value="<?php echo "$ro[idorder]"; ?>">
<input name="tglorder" type="text" value="<?php echo "Tanggal Order : $ro[tglorder] WIB";?>">
<input name="nama" type="text" value="<?php echo "Atas nama : $rag[nama]";?>">
<input name="total" type="text" value="<?php echo "Sebesar IDR $total";?>"><p>
<h2>Dari Rekening</h2>
<input name="namabankpengirim" type="text" placeholder="Nama Bank Pengirim" value="">
<input name="namapengirim" type="text" placeholder="Nama Pengirim" value="">
<input name="jumlahtransfer" type="text" placeholder="Jumlah Transfer" value="">
<input name="tgltransfer" type="date" placeholder="Tanggal Transfer ex : 0000-00-00" value=""> 
<p><h2>Ke Rekening</h2>
<input name="namabankpenerima" type="text" placeholder="Nama Bank Penerima" value="">
<h2>Bukti Transfer</h2>
<?php
if ($rowbyr > 0) {
echo "<div align='center'><a href='buktibayar/$rbyr [bukti]' target='blank'><img src='../buktibayar/$rbyr[bukti]' width='200px'></a></div>"; 
}else{
echo "<input name='bukti' type='file' placeholder='Nama Bank Penerima'>";
echo "<input type='submit' name='konfirmasi' value='KONFIRMASI
PEMBAYARAN'>";
}
?>
</form>
<?php
if($_POST["konfirmasi"]){
$nmbukti = $_FILES["bukti"]["name"];
$lokbukti = $_FILES["bukti"]["tmp_name"];
if(!empty($lokbukti)) {
move_uploaded_file($lokbukti, "../buktibayar/$nmbukti");
}
$sqlb = mysqli_query($kon, "insert into pembayaran (idorder, namabankpengirim, namapengirim, jumlahtransfer, tgltransfer, namabankpenerima, bukti) 
values('$_POST[idorder]', '$_POST[namabankpengirim]', '$_POST[namapengirim]','$_POST[jumlahtransfer]', 
'$_POST[tgltransfer]','$_POST[namabankpenerima]', '$nmbukti')");
if ($sqlb) {
echo "Konfirmasi Pembayaran Berhasil";
}else{
echo "Konfirmasi Gagal";
} echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
}
?>
</div>
</div>
