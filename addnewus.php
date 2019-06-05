<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/addnewus.css">
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
                echo '<img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">';
                echo '</div>';
                echo '<div class = "inp_fields">';
                echo '<input class="log_text" placeholder="Логин" name = "log_text1" type="text" required><br><br>';
                echo '<input class="pass_text" placeholder="Пароль" name = "pass_text1" type="password" required><br><br>';
                echo '<select class="role_text" name = "role_text1"><option value = "admin">Администратор</option><option value = "teacher">Преподаватель</option><option value = "student">Студент</option></select><br><br>';
                echo '<input class="adduser" type = "submit" name = "add_user1" value = "Добавить пользователя">';
                echo'</div>';
                echo '</form>';
                echo '<form name="id_text" method="post">';
                echo '<input class = "delus_Button" name = "delus_but" type = "submit" value = "Удалить учётную запись c данным id">';
                addus();
                show_us_list();
                show_us();
                delus();
                echo '</form>';
            }
            ?>
</body>
</html>