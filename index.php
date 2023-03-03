<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dziennik szkolny wyświetla klasy, uczniów, oceny i wiadomości.">
    <meta name="author" content="Szymon Tarasiewicz">
    <meta name="keywords" content="dziennik, php, mysql"> 
    <title>Dziennik elektroniczny</title>
    <link rel="stylesheet" href="./Styles/openai-chat-style.css">
    <script src="Scripts/mainPage.js"></script>
</head>
<body>
<header>
  <div id="header">
    <h1>Dziennik elektroniczny</h1>
  </div>
  <div id="prawy">
    <ol id="menu">
      <li><a href="#" id="menu-li">Zaloguj się</a>
        <ul>
          <li><a href="./uczen/main.php">Rodzic lub uczeń</a></li>
          <li><a href="./nauczyciel/main.php">Pracownik szkoły</a></li>
        </ul>
      </li>
    </ol>
  </div>  
</header>

<main>
<main>
  <h3>Dziennik elektroniczny dla uczniów i nauczycieli.</h3>
  <hr>
  <H2>
    <form action="index.php" method="post">
      <label>Wyświetl uczniów klasy:
        <input type="text" name="klasa">
      </label>
      <input type="submit" value="Pokaż oceny">
    </form>
  </H2>
  <?php
  if(isset($_POST["klasa"])){

    if(empty($_POST["klasa"])){
      echo '<span style="color: darkblue;">Nie podano nazwy klasy</span>';
    }else{
      require_once "dbconnect.php";
      // Pobranie danych o uczniach z konkretnej klasy
      $klasa = $_POST["klasa"];
      $query = "SELECT imie, nazwisko, sr_ocen, klasa_id FROM uczniowie JOIN klasy
      ON klasy.id = uczniowie.klasa_id WHERE klasa=:klasa";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':klasa', $klasa, PDO::PARAM_STR);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

      if(count($rows) == 0){
        echo '<span style="color:red;">Nie ma takiej klasy w szkole</span>';
      }else{
echo<<<END
	<h3>Oto uczniowie klasy $klasa:</h3>
  <table>
    <thead>
      <tr>
        <th>Imię</th>
        <th>Nazwisko</th>
        <th>Średnia ocen</th>
      </tr>
    </thead>
    <tbody>
END;
        foreach($rows as $row){
          echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko'].
          "</td><td>".$row['sr_ocen']."</td></tr>";
        }
echo<<<END
    <tbody>
  </table>

  <h3><span>Dodaj ucznia do klasy: $klasa
END;
ECHO " Id tej klasy to: ".$row['klasa_id'].", jeśli chcesz dodać ucznia do tej klasy wpisz nr. id w formularzu.</span>";
ECHO<<<END
</h3>
  <!--przycisk do wyświetlenia formularza-->
  <button id="add-student-btn" onclick="showAddStudentForm()">Dodaj ucznia</button>
  
  <!--formularz do dodawania ucznia-->
  <form id="add-student-form" action="dodaj ucznia.php" method="post" style="display: none;">
    <label>Imię: <input type="text" name="imie"></label>
    <label>Nazwisko: <input type="text" name="nazwisko"></label>
    <label>Średnia ocen: <input type="text" name="sr_ocen"></label>
    <label>Klasa_id: <input type="text" name="klasa_id"></label>
    <input type="submit" name="insert" value="Dodaj ucznia">
  </form>  
END;
  
  include 'dodaj ucznia.php';
      }
    }
  }
?>
    <hr>
  <div id="video"> 
    <h1>Przykładowy film:</h1>
    <video width="960" height="720" autoplay controls>
      <source src="Suzanne Vega - Tom's Diner (Original Version - HD 720p).mp4" type="video/mp4">
    </video>
  </div>
</main>
<script>
  
</script>
</body>
</html>