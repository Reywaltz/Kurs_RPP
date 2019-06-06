<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/showstudses.css">
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
                echo '<select class="sem" name = "sem_text"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>';
                echo '<input class="add" type = "submit" name = "show_ses_stud" value = "Показать результаты сессии">';
                echo '<div class = "text">';
                echo '<p class = "sem_choice">Семестр</p>';
                echo '</form>';
                showstudsession();
                
            }
            ?>
</body>
</html>