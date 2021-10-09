<?php 
ob_start();
session_start();

include 'baglan.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style-login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
</head>
<body>

	<div class="main">
		<div class="left-side">
			<img src="code.jpg">
		</div>
		<div class="right-side">
			<hr><hr>
			<h1>Giriş Yap</h1>
		<form action="islem.php" method="post">
			<div>
				<i class="fas fa-user"></i>
				<input type="text" name="kullanici_mail" placeholder="Mail Girin" required>
			</div>
			<div>
				<i class="fas fa-key"></i>
				<input type="password" name="kullanici_password" placeholder="Şifrenizi Girin" required>
			</div>
			
			<button type="submit" name="giris">Giriş Yap</button>
		</form>
			
			<p>Yada Bunlar İle Giriş Yap</p>
			<i class="fab fa-facebook"></i>
			<i class="fab fa-instagram"></i>
			<i class="fab fa-twitter"></i>
		</div>
	</div>

</body>
</html>

</body>
</html>