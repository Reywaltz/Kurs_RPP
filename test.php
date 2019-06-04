<?php

    $host = 'localhost';
    $database = 'test';
    $user = 'root';
    $connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
    mysqli_query($connection,"SET NAMES utf8");
    $query1 = "DELETE FROM `groups` WHERE `grp_name` = 'ИКБО-14-17'";
    echo($query1);
?>