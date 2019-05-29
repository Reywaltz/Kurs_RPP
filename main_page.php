<!DOCTYPE html>
    <html lang='ru'>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link rel="stylesheet" href="style/main_page.css">
            <title>Домашняя страница</title>
        </head>
        <body>
            <?php
            include_once('scripts.php');
            session_start();
            get_main_page();
            log_out();
            ?>    
        </body>
    </html>