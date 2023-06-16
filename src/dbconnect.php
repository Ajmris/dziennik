<?php
    $dsn = 'pgsql:host=localhost; dbname=dziennik_szkolny';
    $user = 'postgres';
    $password = 'szymon';

    try {
        // Połączenie z bazą danych
        $pdo = new PDO($dsn, $user, $password);
        echo '<h1>Baza danych podłączona!</h1>';
    } catch (PDOException $error) {
        echo '<h1>Połączenie nieudane!</h1>';
    }
?>