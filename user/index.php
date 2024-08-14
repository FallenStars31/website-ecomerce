<?php
  session_start();
  include "koneksi.php";
  $sqlag = mysqli_query($kon, "select * from user where email='$_SESSION[userag]' and password='$_SESSION[passag]'");
  $rag = mysqli_fetch_array($sqlag);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<title>FallenStars</title>
</head>

<body>

<div class="container1">
  <div class="grid">
    <div class="dh12">

	</div>
  </div>
</div>

    <?php
    include "menu.php";
    ?>

<div class="container3">
  <div class="grid">
    <div class="dh12">
	  <form method="post" action="<?php echo "?p=produkterbaru"; ?>">
	  <input name="cari" type="text" placeholder="Ketik Nama Produk Yang Akan Dicari" />
	  <input type="submit" name="Submit" value="Cari" />
	  </form>  
	</div>
  </div>
</div>
<?php
if($_GET["p"] == "produkterbaru"){
  include "produkterbaru.php";
}else if($_GET["p"] == "produkdetail"){
  include "produkdetail.php";
}else if($_GET["p"] == "keranjang"){
  include "keranjang.php";
}else if($_GET["p"] == "keranjangbelanja"){
  include "keranjangbelanja.php";
}else if($_GET["p"] == "keranjangedit"){
  include "keranjangedit.php";
}else if($_GET["p"] == "keranjangdel"){
  include "keranjangdel.php";
}else if($_GET["p"] == "selesaibelanja"){
  include "selesaibelanja.php";
}else if($_GET["p"] == "selesaibelanjaaksi"){
  include "selesaibelanjaaksi.php";
}else if($_GET["p"] == "register"){
  include "register.php";
}else if($_GET["p"] == "riwayat"){
  include "riwayat.php";
}else if($_GET["p"] == "konfirmasi"){
  include "konfirmasi.php";
}else if($_GET["p"] == "login"){
  include "login.php";
}else if($_GET["p"] == "logout"){
  include "logout.php";
}else{
  // include "home.php";
  include "produkterbaru.php";
}
?>
<!-- awal dari footer -->
<section class="footer">
  <footer class="footer-flex">
    <div class="footer2">
        <div class="isi1">
            <h3 class="peta">Peta Situs</h3>
            <ul class="listpeta">
                <li><a href="">Beranda</a></li>
                <li><a href="">produk terbaru</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>
        <div class="isi2">
                <h3 class="peta">Projek</h3>
                <ul class="listprojek">
                    <li><a href="#">Hotel Bungo Plaza</a></li>
                    <li><a href="#">Perumahan Graha Sungai Buluh Indah</a></li>
                    <li><a href="#">Bungo City Indah</a></li>
                    <li><a href="#">Bank Mandiri Sungai Rumbai</a></li>
                </ul>
        </div>
        <div class="isi3">
                <h3 class="peta">Kontak</h3>
               <ul class="icon-sosmed">
                <li><a class="sosmed" href=""><img src="img/icons8-contact-50.png" alt="..." class="iconkontak"><b>082286755953</b><i class="fa-brands fa-tiktok fa-lg"></i></a></li>
                <li><a class="sosmed" href=""><img src="img/icons8-email-50.png" alt="..." class="iconkontak"><b>Naufaliksan78@gmail.com</b><i class="fa-brands fa-instagram fa-lg"></i></a></li>
                <li><a class="sosmed" href=""><img src="img/icons8-instagram-50.png" alt="..." class="iconkontak"><b>Naufaalikhsan</b><i class="fa-brands fa-youtube fa-lg"></i></a></li>
               </ul>
        </div>
    </div>
</footer>
<hr class="garis-bawah">
<div class="hakcipta">
    <p class="text-hc">Copyright &copy; Naufal ikhsan erman <span class="tentang-kami">Tentang Kami</span> <span class="batas">|</span> <span class="sk">Syarat & Ketentuan Penggunaan</span></p>
</div>

</section>
<!-- akhir dari footer -->
	  
</body>
</html>