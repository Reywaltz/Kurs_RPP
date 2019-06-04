<?php
function db_connect()
{
    
}

function log_in()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($connection));
    if (isset($_POST['auth']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE login = '{$login}' and password = '{$password}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $res = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1)
        {
            session_start();
            $_SESSION['id'] = $res['id'];
            $_SESSION['login'] = $res['login'];
            $_SESSION['password'] = $res['password'];
            $_SESSION['img'] = $res['img'];
            // $_SESSION['name'] = $res['name'];
            // $_SESSION['grp'] = $res['grp'];
            // $_SESSION['role'] = $res['role'];
            // $_SESSION['otd'] = $res['otd'];
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
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM users WHERE login = '{$_SESSION['login']}' and `password` = '{$_SESSION['password']}'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $res = mysqli_fetch_assoc($result);
    // print_r($res);
    if($res['role'] == 'admin')
    {
        echo '<div class="menu">
                <div class="nav">
                    <a href="\admin/branches/allBranches.php">Отделения</a>
                    <a href="semester.php">Семестры</a>
                    <a href="groups.php">Группы</a>
                    <a href="actionWithTeachers.php">Преподаватели</a>
                    <a href="subject.php">Предметы</a>
                    <a href="\admin/students/chooseBranch.php">Студенты</a>
                    <a href="\admin/marks/chooseGroupAndSubject.php">Оценки</a>
                </div>
                <div class="welcome">
                    <p>Личный кабинет: '; echo("Администратор"); 
                    echo '<form class="exit_b" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                    </form>
                </div>
            </div>';
    }
    elseif($res['role'] == 'teacher')
    {
        print_r($_SESSION);
        echo '</br>';
        $query = "SELECT * FROM teachers WHERE ('{$_SESSION['id']}' = teach_id)";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $res = mysqli_fetch_assoc($result);
        echo '<div class="menu">
                <div class="nav">
                    <a href="\admin/groups/allGroups.php">Группы</a>
                    <a href="\admin/students/chooseBranch.php">Студенты</a>
                    <a href="\admin/semesters/allSemesters.php">Семестры</a>
                </div>
                <div class="welcome">
                    <p><b>Личный кабинет: '; echo($res['teach_name']); echo('<br>'); echo($res['sub_name']);
                    echo '	
                    <form class="exit_b" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                    </form>';
    }
    elseif($res['role'] == 'student')
    {
        print_r($_SESSION);
        echo '</br>';
        $query = "SELECT * FROM students WHERE ('{$_SESSION['id']}' = std_id)";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $res = mysqli_fetch_assoc($result);
        print_r($res);
        echo '<div class="menu">
        <div class="nav">
            <a href="\admin/semesters/allSemesters.php">Семестры</a>
            <a href="\admin/semesters/allSemesters.php">Академические задолжности</a>
        </div>
        <div class="welcome">
            <p><b>Личный кабинет: '; echo($res['name']); echo('<img src ="'.$res['img'].'"width="100" height="100"><br>');
            echo '	
            <p><b>Учебная группа: '; echo($res['grp_name']);
            echo ' 
            <form class="exit_b" action="" method="POST">
                <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
            </form>';   
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
        $array_id[] = $res['id'];
    }  
    for($i=0; $i < count($array); $i++)
    {
        echo '<tr>'.'<td>'.'<input type="radio" name="contact" value='.$array_id[$i].'</td>'.'<td>'.$array[$i]['start_date'].'</td>'.'<td>'.$array[$i]['end_date'].'</td>'.'<td>'.$array[$i]['active'].'</td>'.'</tr>';
    }
    // print_r($array);
}

function del_semester()
{
    $host = 'localhost';
    $database = 'users';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "DELETE FROM `semestr` where `id` = '{$_POST['contact']}'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
}

function show_groups()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT DISTINCT `grp_name` FROM `groups`";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    while($res = mysqli_fetch_assoc($result))
    {
        $array[] = $res; 
    }
    echo('<select class = "grp_list_class" name = "grp_list">');
    // print_r($array);
    for ($i = 0; $i < count($array); $i++)
    {
        echo '<option value = "'.$array[$i]['grp_name'].'">'.$array[$i]['grp_name'].'</option>';
    }
    echo('</select>');  
    // print_r($array);
}

function show_students()
{
    if (isset($_POST['get_std']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query = "SELECT * FROM `students` WHERE `grp_name`= '{$_POST['grp_list']}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        // print_r($_POST);
        while($res = mysqli_fetch_assoc($result))
        {
            $array[] = $res;
        }

        if(!empty($array))
        {
            // print_r($array); 

            echo '<table class = "student_table" border="1"><tbody>
                <tr>
                    <th>Номер студ. билета</th>
                    <th>ФИО</th>
                    <th>Группа</th>
                </tr>					
                </tbody>';
            for ($i = 0; $i < count($array); $i++)
            {                                                                                                                                                                                                                            
                echo '<tr>'.'<td>'.$array[$i]['u_id'].'</td>'.'<td>'.$array[$i]['name'].'</td>'.'<td>'.$array[$i]['grp_name'].'</td>';
            }
            echo("</table");
        }
        else
        {
            echo('<div class = num>');
            echo('<p>В данной группе пока нет студентов</p>');
            echo('</div>');
        }
    }
}

function addnewgrp()
{
    if(isset($_POST['get_grp']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query_check = "SELECT * FROM `groups` WHERE `grp_name` = '{$_POST['get_grp']}'"; 
        $result_check = mysqli_query($connection, $query_check) or die(mysqli_error($connection));
        while($res_check = mysqli_fetch_assoc($result_check))
        {
            $array[] = $res_check;
        }
        if(!empty($array))
        {
            echo '<script>alert("Такая группа уже есть");</script>';
        }
        else
        { 
            $query = "INSERT INTO `groups` (`grp_id`, `grp_name`) VALUES (NULL, '{$_POST['get_grp']}')";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            echo '<script>alert("Группа успешно добавлена");</script>';
        }
    }
}


function editgrp()
{
    if(isset($_POST['grp_list']))
    {
        if($_POST['edit_text1'] != "")
        {
            $host = 'localhost';
            $database = 'test';
            $user = 'root';
            $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
            mysqli_query($connection,"SET NAMES utf8");
            $query1 = "SELECT * FROM `groups` WHERE `grp_name` = '{$_POST['grp_list']}'";
            $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
            while($res = mysqli_fetch_assoc($result1))
            {
                $array[] = $res;
            }
            $grp_id = $array[0]['grp_id'];
            $query = "UPDATE `groups` SET `grp_name` = '{$_POST['edit_text1']}' WHERE `groups`.`grp_id` = '$grp_id'";
            // echo($query);
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
            print_r($res = mysqli_fetch_assoc($result1));
            echo '<script>alert("Группа успешно изменена");</script>'; 
            show_groups();
        }
        else
        {
            echo '<script>alert("Введите новое значение группы");</script>';
        }
    }
}

function delgrp()
{
    if(isset($_POST['del_but']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query1 = "DELETE FROM `groups` WHERE `grp_name` = '{$_POST['grp_list']}'";
        $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
        echo '<script>alert("Группа удалена");</script>'; 
    }
}

function addus()
{
    if(isset($_POST['add_user1']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query = "SELECT * FROM `users` WHERE `login` = '{$_POST['log_text1']}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        while($res = mysqli_fetch_assoc($result))
        {
            $array[] = $res;
        }
        if(empty($array))
        {
            $query1 = "INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES ('NULL', '{$_POST['log_text1']}', '{$_POST['pass_text1']}', '{$_POST['role_text1']}')";
            $result = mysqli_query($connection, $query1) or die(mysqli_error($connection));
            echo '<script>alert("Учётная запись добавлена");</script>';
        }
        else
        {
            echo '<script>alert("Запись с таким логином уже существует");</script>';
        }
    }
}

function delus()
{
    if(isset($_POST['delus_but']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query = "DELETE FROM `users` WHERE `id` = '{$_POST['id_text1']}'";
        echo($query);
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        header('Location: addnewus.php');
    }
}

function show_us()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    // print_r($_POST);
    while($res = mysqli_fetch_assoc($result))
    {
        $array[] = $res;
    }
    if(!empty($array))
    {
        // print_r($array); 

        echo '<table class = "student_table" border="1"><tbody>
            <tr>
                <th>ID</th>
                <th>Логин</th>
                <th>Пароль</th>
                <th>Роль</th>
            </tr>					
            </tbody>';
        for ($i = 0; $i < count($array); $i++)
        {                                                                                                                                                                                                                            
            echo '<tr>'.'<td>'.$array[$i]['id'].'</td>'.'<td>'.$array[$i]['login'].'</td>'.'<td>'.$array[$i]['password'].'</td>'.'<td>'.$array[$i]['role'].'</td>';
            
        }
        echo("</table");
    }
    else
    {
        echo('<div class = num>');
        echo('<p>В данной группе пока нет студентов</p>');
        echo('</div>');
    }
}

function show_us_list()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM `users`";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    // print_r($_POST);
    while($res = mysqli_fetch_assoc($result))
    {
        $array[] = $res;
    }
    // print_r($array);
    if(!empty($array))
    {
        // print_r($array);		
        echo '<select class="id_text" name = "id_text1">';
        for ($i = 0; $i < count($array); $i++)
        {                                                                                                                                                                                                                            
            echo '<option value ="'.$array[$i]['id'].'">'.$array[$i]['id'].'</option>';
        }
        echo '</select>';
    }
    else
    {
        echo('<div class = num>');
        echo('<p>В данной группе пока нет студентов</p>');
        echo('</div>');
    }
}

function addsubject()
{
    if(isset($_POST['add_subject1']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query = "SELECT * FROM `subjects` WHERE `sub_name` = '{$_POST['sub_text1']}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        while($res = mysqli_fetch_assoc($result))
        {
            $array[] = $res;
        }
        if(empty($array))
        {
            $query1 = "INSERT INTO `subjects`(`sub_id`, `sub_name`) VALUES ('NULL', '{$_POST['sub_text1']}')";
            $result = mysqli_query($connection, $query1) or die(mysqli_error($connection));
            echo '<script>alert("Предмет добавлен");</script>';
        }
        else
        {
            echo '<script>alert("Предмет с таким названием уже существует");</script>';
        }
    }
}

function show_subject()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query = "SELECT * FROM `subjects` ORDER BY `subjects`.`sub_id` ASC";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    // print_r($_POST);
    while($res = mysqli_fetch_assoc($result))
    {
        $array[] = $res;
    }
    if(!empty($array))
    {
        // print_r($array); 

        echo '<table class = "student_table" border="1"><tbody>
            <tr>
                <th>ID</th>
                <th>Предмет</th>
            </tr>					
            </tbody>';
        for ($i = 0; $i < count($array); $i++)
        {                                                                                                                                                                                                                            
            echo '<tr>'.'<td>'.$array[$i]['sub_id'].'</td>'.'<td>'.$array[$i]['sub_name'].'</td>';
            
        }
        echo("</table");
    }
    else
    {
        echo('<div class = num>');
        echo('<p>В данной группе пока нет предметов</p>');
        echo('</div>');
    }
}

function delsubjects()
{
    if(isset($_POST['del_subject1']))
    {
        $host = 'localhost';
        $database = 'test';
        $user = 'root';
        $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
        mysqli_query($connection,"SET NAMES utf8");
        $query = "DELETE FROM `subjects` WHERE `sub_name` = '{$_POST['sub_text1']}'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        header('Location: subject.php');
    }
}

function getsubid()
{
    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query1 = "SELECT * FROM `subjects` ORDER BY `sub_id` ASC";
    $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
    while($res = mysqli_fetch_assoc($result1))
    {
        $array[] = $res;
    }
    if(!empty($array))
    {	
        echo '<select class="subid_text" name = "subid_text1">';
        for ($i = 0; $i < count($array); $i++)
        {                                                                                                                                                                                                                            
            echo '<option value ="'.$array[$i]['sub_id'].'">'.$array[$i]['sub_id'].'</option>';
        }
        echo '</select>';
    }
}

function editsubject()
{
    if(isset($_POST['edit_subject1']))
    {
        if($_POST['edit_text1'] != "")
        {
            $host = 'localhost';
            $database = 'test';
            $user = 'root';
            $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
            mysqli_query($connection,"SET NAMES utf8");
            $query1 = "SELECT * FROM `subjects` WHERE `sub_name` = '{$_POST['subid_text1']}'";
            $result1 = mysqli_query($connection, $query1) or die(mysqli_error($connection));
            while($res = mysqli_fetch_assoc($result1))
            {
                $array[] = $res;
            }
            $query = "UPDATE `subjects` SET `sub_name` = '{$_POST['edit_text1']}' WHERE `sub_id` = '{$_POST['subid_text1']}'";
            $result = mysqli_query($connection, $query) or die(mysqli_error($connection));

            echo '<script>alert("Предмет успешно изменен");</script>'; 
        }
        else
        {
            echo '<script>alert("Введите новое значение предмета");</script>';
        }
    }
}
?>     