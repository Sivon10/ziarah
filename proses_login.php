<?php
session_start();
include "koneksi.php";

@$email=$_POST['email_pelanggan'];
$pengacak="p3ng4c4k";
@$password=$_POST['password_pelanggan'];
$password_acak=md5($pengacak.md5($password.$pengacak.$pengacak));
@$kirim=$_POST['kirim'];

$query="SELECT * FROM pelanggan WHERE email_pelanggan='$email' and password_pelanggan='$password_acak'";
$hasil=mysqli_query($koneksi,$query);

$cek=mysqli_num_rows($hasil);

if ($cek>0) {
	$data=mysqli_fetch_array($hasil);
	if ($data['level']=="admin") {
		$_SESSION['pelanggan']=$data;
		$_SESSION['level']="admin";

		header("location:admin/index.php");
	}elseif ($data['level']=="user") {
		$_SESSION['pelanggan']=$data;
		$_SESSION['level']="user";

		header("location:index2.php");
	}else{
		?>
		<script>
		alert("Login gagal!");
		document.location.href="login.php";
		</script><?php
	}
} else {
	?>
	<script>
	alert("Pastikan username dan password benar!");
	document.location.href="login.php";
	</script><?php
}
?>