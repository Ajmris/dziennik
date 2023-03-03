<?php
    $dsn = 'mysql:host=localhost; dbname=dziennik_szkolny; charset=utf8mb4';
    $user = 'root';
    $password = '';

    try{
        // Połączenie z bazą danych
        $pdo = new PDO($dsn, $user, $password);
        echo '<h1>Baza danych podłączomna!</h1>';
    }
    catch(PDOException $error){
        echo '<h1>Połączennie nieudane!</h1>';
    }
?>