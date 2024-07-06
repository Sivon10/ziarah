<?php
//enkripsi md5
include "koneksi.php";
$email=$_POST['email_pelanggan'];
$password=$_POST['password_pelanggan'];
$ulang_password=$_POST['ulang_password'];
$nama=$_POST['nama_pelanggan'];
$telepon=$_POST['telepon_pelanggan'];
$level="user";
$kirim=$_POST['kirim'];
//acak password+
$pengacak="p3ng4c4k";
$password_acak=md5($pengacak.md5($password.$pengacak.$pengacak));
if ($password==$ulang_password) {
	if ($kirim) {
		$query="INSERT INTO pelanggan VALUES ('$email','$password_acak','$nama','$telepon','$level')";
		$hasil=mysqli_query($koneksi,$query);
		$query2="INSERT INTO profil (email_pelanggan) VALUES ('$email')";
		$hasil2=mysqli_query($koneksi,$query2);
		?>
		<script>alert("Akun berhasil dibuat");
		document.location.href="login.php";
		</script>
		<?php
		
	}else{
		?>
		<script>alert("Register gagal");
		document.location.href="register.php";
		</script>
		<?php
	}
}else{
	?>
	<script type="text/javascript">
		alert("Password tidak sama");
		document.location.href="register.php";
	</script><?php
}
?>