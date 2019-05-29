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
		<h3>Добавить семестр</h3>
		<form name="add_semester" action="" method="post">
            <label>Дата начала семестра*</label><br>
			<input class="input_text" required placeholder="Введите дату" type="date" name="start_date"><br><br>
            <label>Дата конца семестра*</label><br>
            <input class="input_text" required placeholder="Введите дату" type="date" name="end_date"><br><br>
            <input type="checkbox" name="isActive">
            <label>Является ли семестр активным</label><br><br>
			<button class="standartButton" type="submit" name="update">Добавить</button>
        <?php
            if (isset($_POST['update']))
            {
                $host = 'localhost';
                $database = 'users';
                $user = 'root';
                $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
                mysqli_query($connection,"SET NAMES utf8");
                $start_date = $_POST["start_date"];
                $end_date = $_POST['end_date'];
                if ($start_date == $end_date)
                {
                    echo('<script>alert("Поля даты не должны совпадать")</script>');
                }
                elseif($start_date > $end_date)
                {
                    echo('<script>alert("Дата начала не может быть позде даты окончания")</script>');
                }
                else
                {
                    $checked = $_POST['isActive'];
                    if($checked == "on")
                    {
                        $checked = "Да";
                    }
                    else
                    {
                        $checked = "Нет";
                    }
                $query = "INSERT INTO `semestr`(`start_date`, `end_date`, `active`) VALUES ('{$start_date}', '{$end_date}', '{$checked}')";
                $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
                echo('<script>alert("Семестр добавлен")</script>');
                }
            }
        ?>
            </table>
        </form>
    </main>
    <div class = 'journal'>
                <img class = "main_journal" src="src/diary_background.png" alt="jrl">
            </div>
</body>
</html>