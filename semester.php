<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/semester.css">
    <title>Семестры</title>
</head>
<body>
    <?php
        include_once('scripts.php');
        session_start();
        get_main_page();
        log_out();
    ?>
        <main class="main">	
		<a href="addsemester.php">Добавить новый семестр</a> <br>
		<h3>Список всех семестров</h3>
		<form name="get_semester" action="" method="post">
			<input class="standartButton pr" type="submit" name="editMarkedItem" value="Правки">
			<input class="standartButton de" type="submit" name="deleteMarkedItems" value="Удалить">
			<span style="color: red" ;=""></span> <br> </br>
			<table class="" border="1">
			<tbody>
                <tr>
                    <th></th>
					<th>Начало</th>
					<th>Окончание</th>
					<th>Является ли действующим</th>
				</tr>					
            </tbody>
        <?php
            get_semester();
            del_semester();
        ?>
            </table>
        </form>
    </main>
    <div class = 'journal'>
        <img class = "main_journal" src="src/diary_background.png" alt="jrl">
    </div>
</body>
</html>