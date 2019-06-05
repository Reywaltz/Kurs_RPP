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
                echo '<input class="add" type = "submit" name = "add_ses" value = "Внести данные об сессии">';
                echo'</div>';
                echo '<div class = "text">';
                echo '<p class = "name_choice">Студент</p>';
                echo '<p class = "date_choice">Дата</p>';
                echo '<p class = "sem_choice">Семестр</p>';
                echo '<p class = "grade_choice">Оценка</p>';
                echo '<p class = "type_choice">Тип экзамена</p>';
                echo'</div>';
                echo '</form>';
                showsession();
                // delus();
                
            }
            ?>
</body>
</html>