<html>
    <head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <title>Авторизация</title>
	    <link rel="stylesheet" href="style/index.css">
    </head>
    <body>
		<?php
		session_start();
		$_SESSION['id'] = "1";
		print_r($_SESSION);
		?>
	</body>
</html>