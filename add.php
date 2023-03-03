<?php
if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['sr_ocen']) && isset($_POST['klasa'])){
    require 'dbconnect.php';
    $imie=$_POST['imie'];
    $nazwisko = $_POST["nazwisko"];
    $sr_ocen = $_POST["sr_ocen"];
    $klasa = $_POST['klasa'];

    if(empty($imie) || empty($nazwisko) || empty($sr_ocen) || empty($klasa)){
        header("Location: index.php?mess=error");
    }else{
        $query3 = "SELECT id FROM klasy WHERE klasa=:klasa";
        $stmt = $pdo->prepare($query3);
        $stmt->bindParam(':klasa', $klasa, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $id_klasy = $row['id'];

        $query4 = "INSERT INTO uczniowie (imie, nazwisko, sr_ocen, klasa_id) VALUES(:imie, :nazwisko, :sr_ocen, :id_klasy)";
        $stmt = $pdo->prepare($query4);
        $stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
        $stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
        $stmt->bindValue(':sr_ocen', $sr_ocen, PDO::PARAM_STR);
        $stmt->bindValue(':id_klasy', $id_klasy, PDO::PARAM_INT);
        $stmt->execute();

        echo '<span style="color:green;">Uczeń został pomyślnie dodany</span>';
    }
}