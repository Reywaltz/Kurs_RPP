<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/subject.css">
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
                echo '<div class = "journal">';
                echo '<img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">';
                echo '</div>';
                echo '<div class = "inp_fields">';
                echo '<h2>Напишите название нового предмета</h2>';
                echo '<input class="sub_text" placeholder="Название предмета" name = "sub_text1" type="text" required><br><br>';
                echo '<input class="add_subject" type = "submit" name = "add_subject1" value = "Добавить предмет" required>';
                echo'</div>';
                echo '</form>';
                addsubject();
                show_subject();
                echo '<form name="id_text" method="post">';
                // show_us_list();
                // show_us();
                // delus();
                echo '</form>';
            }
            ?>
</body>
</html>