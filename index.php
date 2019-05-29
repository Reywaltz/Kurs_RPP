<!DOCTYPE html>
<html>
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <title>Авторизация</title>
	    <link rel="stylesheet" href="style/index.css">
    </head>
    <body>
	<?php
		include_once('scripts.php');
        log_in();
	?>
    	<div class="authPage">
	    	<form name="auth" action="" method="POST">
		    	<h2>Вход для зарегистрированных пользователей</h2>
			    <input class="standardInput" type="text" name="login" placeholder="Имя пользователя"> <br><br>
			    <input class="standardInput" type="password" name="password" placeholder="Пароль"> <br><br>
			    <input class="standardButton" type="submit" name="auth" value="ВОЙТИ">
		    </form>
			<b><a href="https://vk.com/george99" target="_blank">Разработчик Семёнов Георгий</a></b><br>
			<a href="https:/vk.com/george99">
				<img id = "vk_logo" src="src/logo/vk_logo.png" alt="vk_logo">
			</a>
			<a href="https://www.instagram.com/george1147/">               
				<img id = "insta_logo" src="src/logo/insta_logo.png" alt="insta_logo">
			</a>    
			<a href="https://t.me/Reywaltz">
				<img id = "tele_logo" src="src/logo/telegram_logo.png" alt="telegram_logo">
			</a>
		</div>
	</body>
</html>

