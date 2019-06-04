<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/groups.css">
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
		<form name="grp_list" method="post">
            <?php
            {
                echo '
                    <input class="showButton" type="submit" name = "get_std" value="Получить список студентов"><br>
            </main>
            <div class = "journal">
                <img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">
            </div>';
                show_groups();
                echo'<a class="addButton" href = "addnewgrp.php">Добавить новую/Удалить группу</a>';
                echo'<a class="add_us_Button" href = "addnewgrp.php">Добавить новую/Удалить учётную запись</a>';
                echo '</form>';
                echo '<form name="std_list" method="post">';
                show_students();
                // editstd();
                echo '</form></div>';
            }
            ?>
    ?>
</body>
</html>