<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/addmark.css">
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
                echo '<div class = "inp_fields">';
                getstudid();
                echo '<input class="date_text" placeholder="Дата экзамена" name = "date_text1" type="date" required><br><br>';
                echo '<select class="sem" name = "sem_text"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>';
                echo '<select class="grade" name = "grade_text"><option value="Незачёт">Незачёт</option><option value = "Зачёт">Зачёт</option><option value="2">2</option><option value = "3">3</option><option value="4">4</option><option value ="5">5</option></select>';
                echo '<select class="type" name = "type_text"><option value="Зачёт">Зачёт</option><option value ="Экзамен">Экзамен</select>';
                add_mark();
                
                // getstudgrp();
                // delstudent();
                echo '<input class="add" type = "submit" name = "add_ses" value = "Внести данные об сессии">';
                echo'</div>';
                // editstudent();
                // print_r($_SESSION);
                // print_r($_POST);
                echo '</form>';
                

                // echo '<input class="name2_text" placeholder="ФИО преподавателя" name = "name_text2" type="text" required><br><br>';
                // echo '<input class = "delus_Button" name = "delus_but" type = "submit" value = "Удалить учётную запись c данным id">';;
                echo '</form>';
                showsession();
                // delus();
                
            }
            ?>
</body>
</html>