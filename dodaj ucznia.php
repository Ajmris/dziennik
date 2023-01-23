<?php
echo<<<END
<h3>Dodaj ucznia do klasy: $klasa </h3>
  <!--przycisk do wyświetlenia formularza-->
  <button id="add-student-btn" onclick="showAddStudentForm()">Dodaj ucznia</button>

  <!--formularz do dodawania ucznia-->
  <form id="add-student-form" action="index.php" method="post" style="display: none;">
    <label>Imię: <input type="text" name="imie"></label>
    <label>Nazwisko: <input type="text" name="nazwisko"></label>
    <label>Średnia ocen: <input type="text" name="sr_ocen"></label>
    <input type="submit" value="Dodaj ucznia">
  </form>
END;

  $query2 = "SELECT id FROM klasy WHERE klasa='$klasa'";
  $stmt = $pdo->prepare($query2);
  $stmt->execute();
  $row2 = $stmt->fetch(PDO::FETCH_ASSOC);
  $id_klasy=$row2["id"];
  echo $id_klasy;

  // Pobranie danych o uczniach z konkretnej klasy
	if(isset($_POST["imie"]) && isset($_POST["nazwisko"]) && isset($_POST["sr_ocen"])){
	  //pobranie danych z formularza
	  $imie = $_POST["imie"];
    $nazwisko = $_POST["nazwisko"];
	  $sr_ocen = $_POST["sr_ocen"];
    echo $imie.", ".$nazwisko.", ".$sr_ocen.", ".$klasa; 

    //sprawdzenie czy podano wszystkie dane
    if(empty($imie) || empty($nazwisko) || empty($sr_ocen)){
	    echo '<span style="color:red;">Proszę podać wszystkie dane!</span>';
	  }else{
		  //zapisanie danych do bazy danych
	    $query3 = "INSERT INTO uczniowie (imie, nazwisko, sr_ocen, klasa_id) VALUES(:imie, :nazwisko, :sr_ocen, $klasa)";
      $stmt = $pdo->prepare($query3);
      $stmt->bindValue(':imie', $imie, PDO::PARAM_STR);
      $stmt->bindValue(':nazwisko', $nazwisko, PDO::PARAM_STR);
      $stmt->bindValue(':sr_ocen', $sr_ocen, PDO::PARAM_STR);

      $stmt->execute();
			echo '<span style="color:green;">Uczeń został pomyślnie dodany</span>';
	  }
  }
?>