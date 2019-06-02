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
		<form name="std_list" method="post">
            <?php
            if(!isset($_GET['id']))
            {
                echo '<div>';
                show_groups();
                echo'</div>
                    <input class="showButton" type="submit" name = "get_std" value="Получить список студентов"><br>
                </form>
            </main>
            <div class = "journal">
                <img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">
            </div>';
            }
            else
            { 
                echo '</main><div class = "journal">
                <img class = "main_journal" src="src/diary_background.png" alt="jrl" width="1295px">
            </div>';
                show_groups();
                echo'<input class="showButton" type="submit" name = "get_std" value="Получить список студентов"><br>';
                show_students();
                echo '</form>';
           
       
            }
    ?>
</body>
</html>