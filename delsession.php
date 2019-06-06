<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/delsession.css">
            <title>Домашняя страница</title>
        </head>
<body>   
    <?php
        include_once('scripts.php');
        session_start();
        get_main_page();
        log_out();
    ?>     
    <main class="main">	
		<form name="user_data" method="post">
            <?php
            {   
                include_once('scripts.php');
                echo '<div class = "journal">';
                echo '<img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1595px">';
                echo '</div>';
                showsessionlist();
                delsession();
                echo '<input class="del" type = "submit" name = "del_sess" value = "Удалить сессию по id">';
                echo '<div class = "text">';
                echo '<p class = "sem_choice">ID</p>';
                echo '</form>';
                showsessionadm();
            }
            ?>
</body>
</html>