<?php
$host = 'localhost';
$database = 'test';
$user = 'root';
$connection = mysqli_connect($host, $user, "", $database) or die(mysqli_error($link));
mysqli_query($connection,"SET NAMES utf8");
$query_check = "SELECT * FROM `groups` WHERE `grp_name` = 'ИКБО-21-17'"; 
$result_check = mysqli_query($connection, $query_check) or die(mysqli_error($connection));
while($res_check = mysqli_fetch_assoc($result_check))
{
    $array[] = $res_check;
}
if(empty($array))
{
    echo '<script>alert()</script>';
}
?>