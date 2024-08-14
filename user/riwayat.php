<p><div class="container5">
<div class="grid">
<div class="dh12">
<?php
$berat = 0;

$sqlo = mysqli_query($kon, "select * from orders where iduser='$rag[iduser]' order by tglorder desc");
$no = 1;
while($ro = mysqli_fetch_array($sqlo)){
$sqlod = mysqli_query($kon, "select * from orders where idorder='$ro[idorder]'");
$rod = mysqli_fetch_array($sqlod);
$sqlag = mysqli_query($kon, "select * from user where iduser='$rod[iduser]'");
$rag = mysqli_fetch_array($sqlag);
echo "<div class='dh12'>";
echo "<div class='card'>";
echo "<div class='isicard'>";
echo "<h1>#$ro[noorder] - <small>$ro[statusorder]</small></h1>";
echo "Tgl Order: $ro[tglorder] WIB <br>";
echo "<table border='0' cellpadding='3px'>";

$sqlordt = mysqli_query($kon, "select * from orderdetail where idorder='$ro[idorder]'");
while ($rordt = mysqli_fetch_array($sqlordt)){
$sqlpr = mysqli_query($kon, "select * from produk where idproduk='$rordt[idproduk]'");
$rpr = mysqli_fetch_array($sqlpr);
$sqlj = mysqli_query($kon, "select * from jasakirim where idjasa='$rordt[idjasa]'");
$rj = mysqli_fetch_array($sqlj);
$hrg = number_format($rpr["harga"]);
$brt = $rordt["jumlahbeli"] * $rpr["berat"];
$berat = $berat + $brt;
$hrgbr = $hrg;

echo "<tr valign='top'>";
echo "<td><img src='../fotoproduk/$rpr[foto]' height='50px'></td>";
echo "<td><b>$rpr[namaproduk]</b><br>$rordt[jumlahbeli] * IDR $hrgbr <br> $brt
Kg IDR $rj[tarif] (<b>$rj[nama]</b>)</td>";
echo "</tr>";
}
echo "</table>";
$total = number_format ($ro ["total"]);
echo "</div>";
echo "<div class='kepalacard'>Total: IDR $total</div>";
echo "<form action='?p=keranjangedit' method='post' enctype='multipart/from-data'>";
echo "<div class='dh12'>";
	echo "<div align='right'>";
	echo "<a href='?p=konfirmasi&id=$ro[idorder]'><button type='button' class='btn btn-add'>Konfirmasi Pembayaran &raquo;</button></a>";
	echo "</div>";
    echo "</div>";
	echo "</form>";
echo "</div><br>";
echo "</div>";
}
?>

</div>
</div>
</div>