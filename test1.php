<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
{
<?php

// $date1='2011-02-12';
// $date2='2012-02-13';
// if($date1 < $date2)
// {
//     echo('TRUE');
// }
// else{ echo 'False';}
?>				}
</body>
</html> -->

<?php
$sub_id = 4;
$query = "UPDATE `teachers` SET `teach_name` = 'йцуйцуцй', `sub_name` = 'матан' WHERE `teachers`.`sub_id` = {$sub_id}";
echo($query);
?>