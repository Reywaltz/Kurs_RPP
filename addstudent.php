<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/addstudent.css">
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
                echo '<input class="name_text" placeholder="ФИО студента" name = "name_text1" type="text" required><br><br>';
                echo '<input class="name_text1" placeholder="Номер студ. билета" name = "name_text2" type="text" required><br><br>';
                getstudid();
                getstudgrp();
                delstudent();
                echo '<input class="edituser" type = "submit" name = "add_user1" value = "Изменить данные учителя">';
                echo '<input class="delteach" name = "del_teach1" type="submit" value = "Удалить преподавателя по id" required><br><br>';
                echo'</div>';
                editstudent();
                echo '</form>';
                

                // echo '<input class="name2_text" placeholder="ФИО преподавателя" name = "name_text2" type="text" required><br><br>';
                // echo '<input class = "delus_Button" name = "delus_but" type = "submit" value = "Удалить учётную запись c данным id">';;
                echo '</form>';
                showstudent();
                // delus();
                
            }
            ?>
</body>
</html>