<?php
function db_connect()
{
    
}

function log_in()
{
    $host = 'localhost';
    $database = 'users';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($connection));
    if (isset($_POST['auth']))
    {
        echo("КНОПКА НАЖАТА");
        $login = $_POST['login'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE login = '{$login}' and password = '{$password}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $res = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1)
        {
            session_start();
            $_SESSION['id'] = $res['id'];
            $_SESSION['login'] = $res['login'];
            $_SESSION['password'] = $res['password'];
            $_SESSION['img'] = $res['img'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['grp'] = $res['grp'];
            $_SESSION['role'] = $res['role'];
            $_SESSION['otd'] = $res['otd'];
            $_SESSION['check'] = true;
            print_r($_SESSION);
            header('Location: main_page.php');
        }
        else
        {
            echo('Error');
        }
    }

    if (isset($_POST['exit']))
    {
        session_destroy();
    }
}

function log_out()
{
    if (isset($_POST['exit']))
    {
        $_SESSION = array();
        session_destroy();
        header('Location: index.php');
    }
}

function get_main_page()
{
    $host = 'localhost';
    $database = 'users';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM users WHERE login = '{$_SESSION['login']}' and `password` = '{$_SESSION['password']}'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $res = mysqli_fetch_array($result);
    // print_r($res);
    if($res['role'] == 'admin')
    {
        echo '<div class="menu">
                <div class="nav">
                    <a href="\admin/branches/allBranches.php">Отделения</a>
                    <a href="semester.php">Семестры</a>
                    <a href="\admin/groups/allGroups.php">Группы</a>
                    <a href="actionWithTeachers.php">Преподаватели</a>
                    <a href="\admin/subjects/allSubjects.php">Предметы</a>
                    <a href="\admin/students/chooseBranch.php">Студенты</a>
                    <a href="\admin/marks/chooseGroupAndSubject.php">Оценки</a>
                </div>
                <div class="welcome">
                    <p><b>Личный кабинет: '; echo("Администратор"); echo('<img src ="'.$res['img'].'"width="100" height="100">');
                    echo '	
                    <form class="exit_b" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                    </form>
                </div>
            <hr></div>';
    }
    elseif($res['role'] == 'teacher')
    {
        echo '<div class="menu">
                <div class="nav">
                    <a href="\admin/groups/allGroups.php">Группы</a>
                    <a href="\admin/students/chooseBranch.php">Студенты</a>
                    <a href="\admin/semesters/allSemesters.php">Семестры</a>
                </div>
                <div class="welcome">
                    <p><b>Личный кабинет: '; echo($res['name']); echo('<img src ="'.$res['img'].'"width="100" height="100">');
                    echo '	
                    <form class="exit_b" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                    </form>
                </div>
            <hr></div>';
    }
    elseif($res['role'] == 'student')
    {
        echo '<div class="menu">
        <div class="nav">
            <a href="\admin/semesters/allSemesters.php">Семестры</a>
            <a href="\admin/semesters/allSemesters.php">Академические задолжности</a>
        </div>
        <div class="welcome">
            <p><b>Личный кабинет: '; echo($res['name']); echo('<img src ="'.$res['img'].'"width="100" height="100"><br>');
            echo '	
            <p><b>Учебная группа: '; echo($res['grp']);
            echo ' 
            <form class="exit_b" action="" method="POST">
                <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
            </form>
        </div>
    <hr></div>';   
    }
    else{
        print_r($_SESSION);
        // echo '<script>alert()</script>';
        // header('Location:index.php');
        }
}

function get_semester()
{
    $host = 'localhost';
    $database = 'users';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM `semestr`";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    while($res = mysqli_fetch_assoc($result))
    {
        $array[] = $res;
    }  
    for($i=0; $i < count($array); $i++)
    {
        echo '<tr>'.'<td>'.'<input type="radio" id="contactChoice3"
        name="contact" value="mail">'.'</td>'.'<td>'.$array[$i]['start_date'].'</td>'.'<td>'.$array[$i]['end_date'].'</td>'.'<td>'.$array[$i]['active'].'</td>'.'</tr>';
    }
}
?>       