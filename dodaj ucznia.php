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
  $result2 = mysqli_query($conn, $query2) or die("Problemy z odczytaniem danych!");
  $row2=mysqli_fetch_assoc($result2);
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
    if(empty($imie) || empty($nazwisko) || empty($sr_ocen) || empty($id_klasy)){
	  echo '<span style="color:red;">Proszę podać wszystkie dane</span>';
	  }else{
		  //zapisanie danych do bazy danych
	    $query3 = "INSERT INTO uczniowie (imie, nazwisko, sr_ocen, klasa_id) VALUES ('$imie', '$nazwisko', '$sr_ocen', '$id_klasy')";
			mysqli_query($conn, $query3) or die("Nie udało się dodać ucznia");
	    echo '<span style="color:green;">Uczeń został pomyślnie dodany</span>';
	  }
  }
?>