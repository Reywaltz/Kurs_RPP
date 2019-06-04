<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/addnewgrp.css">
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
		<form name="new_grp" method="post">
            <?php
                echo'
                    <h2>Введите название группы</h2>
                    <input class="input_grp" type="text" name = "get_grp" required><br>
                    <input class="addButton" type = "submit" value = "Добавить группу">';
                    addnewgrp();
                echo'</form>';
            echo'<form name="edit_grp" method="post">';
            show_groups();
            echo '<input class="editButton" type = "submit" value = "Изменить группу">';
            echo '<h2 class = "edit_text">Выберите группу для редактирования</h2>';
            echo '<input class = "edit_input" name = "edit_text1" type = "text">';
            echo '<input class = "del_Button" name = "del_but" type = "submit" value = "Удалить группу">';
            editgrp();
            echo'</form>';
            echo '</main>
            <div class = "journal">
                <img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">
            </div>';
             ?>
</body>
</html>