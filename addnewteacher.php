<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/addnewteacher.css">
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
                echo '<input class="name_text" placeholder="ФИО преподавателя" name = "name_text1" type="text" required><br><br>';
                getteachsub();
                getteachid();
                echo '<input class="edituser" type = "submit" name = "add_user1" value = "Изменить данные учителя">';
                echo'</div>';
                editteacher();
                echo '</form>';
                
                echo '<form name="add_user" method="post">';
                // echo '<input class = "delus_Button" name = "delus_but" type = "submit" value = "Удалить учётную запись c данным id">';;
                echo '</form>';
                showteacher();
                // delus();
                
            }
            ?>
</body>
</html>