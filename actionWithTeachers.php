<?php
    include_once('scripts.php');
    session_start();
    if($_SESSION['role'] == 'admin')
    {
        echo '<div class="menu">
                <div class="nav">
                    <a href="\admin/branches/allBranches.php">Отделения</a>
                    <a href="\admin/semesters/allSemesters.php">Семестры</a>
                    <a href="\admin/groups/allGroups.php">Группы</a>
                    <a href="\admin/groups/actionWithTeachers.php">Преподаватели</a>
                    <a href="\admin/subjects/allSubjects.php">Предметы</a>
                    <a href="\admin/students/chooseBranch.php">Студенты</a>
                    <a href="\admin/marks/chooseGroupAndSubject.php">Оценки</a>
                </div>
                <div class="welcome">
                    <p><b>Личный кабинет: '; echo("Администратор"); echo('<img src ="'.$_SESSION['img'].'"width="100" height="100">');
                    echo '	
                    <form class="exit_b" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                    </form>
                    <div class="content">
                        <form class="" action="" method="POST">
                        <input class="standardButton" type="submit" name="exit" value="ВЫЙТИ">
                </form>
                </div>
            <hr></div>';
    }
?>       