<?php
    session_start();
    $host = 'localhost';
    $port = '5432';
    $dbname = 'dziennik_szkolny';
    $user = 'postgres';
    $password = 'szymon';

    $link = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    
    if (!$link) {
        die('Nie można połączyć się z bazą danych: ' . pg_last_error());
    }
?>
