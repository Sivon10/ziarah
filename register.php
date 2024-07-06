<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sidoi - Register Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="proses_registrasi.php">
					<span class="login100-form-title p-b-49">
						Halaman Register
					</span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Nama lengkap tidak boleh kosong">
						<span class="label-input100">Nama Lengkap</span>
						<input class="input100" type="text" name="nama_pelanggan" placeholder="Masukkan nama lengkap">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "email tidak boleh kosong">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email_pelanggan" placeholder="Masukkan email">
						<span class="focus-input100" data-symbol="&#xf194;"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Nomor telepon tidak boleh kosong">
						<span class="label-input100">Nomor Telpon</span>
						<input class="input100" type="number" name="telepon_pelanggan" placeholder="Masukkan nomor telepon">
						<span class="focus-input100" data-symbol="&#xf170;"></span>
					</div>
                    
					<div class="wrap-input100 validate-input m-b-23" data-validate="Password tidak boleh kosong">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password_pelanggan" placeholder="Masukkan password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
                    <div class="wrap-input100 validate-input" data-validate="Konfirmasi password tidak boleh kosong">
						<span class="label-input100">Konfirmasi Password</span>
						<input class="input100" type="password" name="ulang_password" placeholder="Masukkan konfirmasi password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
                            <input id="jkl" class="login100-form-btn" type="submit" name="kirim" value="Register">
						</div>
					</div>

					<div class="flex-col-c p-t-30">
						<span class="txt1 p-b-17">
							Sudah punya akun?
						</span>

						<a href="login.php" class="txt1">
							Login disini!
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>