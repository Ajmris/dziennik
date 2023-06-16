<?php
if (isset($_POST["insert"])) {
    require_once "dbconnect.php";

    // Walidacja pól formularza
    $imie = trim($_POST["imie"]);
    $nazwisko = trim($_POST["nazwisko"]);
    $sr_ocen = trim($_POST["sr_ocen"]);

    if (empty($imie)) {
        echo '<span style="color:red;">Nie podano imienia ucznia</span>';
        exit;
    }

    if (empty($nazwisko)) {
        echo '<span style="color:red;">Nie podano nazwiska ucznia</span>';
        exit;
    }

    if (empty($sr_ocen)) {
        echo '<span style="color:red;">Nie podano średniej ocen ucznia</span>';
        exit;
    }

    $klasa_id = $_POST["klasa_id"];

    // Znalezienie największego identyfikatora w tabeli "uczniowie"
    /*$query = "SELECT MAX(id) FROM uczniowie";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $maxId = $stmt->fetchColumn();

    // Inkrementacja identyfikatora o 1
    $newId = $maxId + 1;*/

    // Wstawienie ucznia do bazy danych
    $query = "INSERT INTO uczniowie (imie, nazwisko, sr_ocen, klasa_id) VALUES (:imie, :nazwisko, :sr_ocen, :klasa_id)";
    $stmt = $pdo->prepare($query);
    //$stmt->bindParam(':id', $newId, PDO::PARAM_INT);
    $stmt->bindParam(':imie', $imie, PDO::PARAM_STR);
    $stmt->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
    $stmt->bindParam(':sr_ocen', $sr_ocen, PDO::PARAM_STR);
    $stmt->bindParam(':klasa_id', $klasa_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo '<span style="color:green;">Dodano ucznia do klasy</span>';
    } else {
        echo '<span style="color:red;">Wystąpił błąd podczas dodawania ucznia</span>';
    }
}
?>