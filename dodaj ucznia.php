<?php
if(isset($_POST["insert"])){
  $imie = $_POST["imie"];
  $nazwisko = $_POST["nazwisko"];
  $sr_ocen = $_POST["sr_ocen"];
  $klasa_id=$_POST["klasa_id"];
  
  // Połączenie z bazą danych
  require_once "dbconnect.php";
  
  echo $klasa_id;

  // Dodanie ucznia do bazy danych
  $query3 = "INSERT INTO uczniowie (imie, nazwisko, sr_ocen, klasa_id) VALUES (:imie, :nazwisko, :sr_ocen, :klasa_id)";
  $stmt = $pdo->prepare($query3);
  $stmt->bindParam(':imie', $imie, PDO::PARAM_STR);
  $stmt->bindParam(':nazwisko', $nazwisko, PDO::PARAM_STR);
  $stmt->bindParam(':sr_ocen', $sr_ocen, PDO::PARAM_STR);
  $stmt->bindParam(':klasa_id', $klasa_id, PDO::PARAM_INT);
  $pdoQuery_exec=$stmt->execute([":imie"=>$imie,":nazwisko"=>$nazwisko,":sr_ocen"=>$sr_ocen, ":klasa_id"=>$klasa_id]);

  if($pdoQuery_exec){
    echo '<script> alert("Dane zostały przekazane za pomocą PDO!") </script>';
  }else{
    echo '<script> alert("Wystąpił jakiś błąd w PDO!") </script>';
  }
}else{
  echo '<span style="color:red; font-size:40px;">Nie uzupełniłeś wszystkich pól!</span>';
}
echo '<a href="index.php">Powrót na główną!</a>';
?>