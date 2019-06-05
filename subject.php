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
                echo '<form name="grp_text" method="post">';
                echo '<input class = "edit_text" name = "edit_text1" type = "text">';
                echo '<input class = "edit_subject" name = "edit_subject1" type = "submit" value = "Редактировать предметмет c данным id">';
                echo '<input class = "del_subject" name = "del_subject1" type = "submit" value = "Удалить предмет c данным id">';
                delsubjects();
                getsubid();
                editsubject();
                addsubject();
                show_subject();
                // print_r($_POST);
                echo '</form>';
                
                echo '</main>';
            }
            ?>
</body>
</html>