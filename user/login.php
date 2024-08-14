<div id="signin">
<fieldset>
<img src="foto/avatar.png" width="120px">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <h3>ANGGOTA</h3>
  <p>SILAHKAN LOGIN<p> 
  <input name="email" type="text" id="email" placeholder="Email">
  <input name="password" type="password" id="password" placeholder="Password">
  <input name="login" type="submit" value="LOGIN ANGGOTA">
  <p>
  Belum terdaftar? <a href="<?php echo "?p=register"; ?>">Register</a> disini
</form>

<?php
	if (!empty($_POST)) {
		if($_POST["login"]){
			$sqlag = mysqli_query($kon, "select * from user where email='$_POST[email]' and password='$_POST[password]'");
			$rag = mysqli_fetch_array($sqlag);
			$row = mysqli_num_rows($sqlag);
			if($row > 0){
				session_start();
				$_SESSION["userag"]=$rag["email"];
				$_SESSION["passag"]=$rag["password"];
				echo "<div align='center'>Login Berhasil</div>";		
			}else{
				echo "<div align='center'>Login Gagal</div>";
			}
			echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=beranda'>";
		}
	}
?>

</fieldset>
</div>