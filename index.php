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
      $conn = mysqli_connect($host, $user, $password, $db);
      mysqli_set_charset($conn, "utf8");
      if (!$conn) {
        die('Połączenie nieudane: '.mysqli_connect_error());
      }
    
      // Pobranie danych o uczniach z konkretnej klasy
      $klasa = $_POST["klasa"];
      $query = "SELECT imie, nazwisko, sr_ocen FROM uczniowie, klasy
      WHERE klasa='$klasa' AND klasy.id = uczniowie.klasa_id";
      $result = mysqli_query($conn, $query) or die("Problemy z odczytaniem danych!");
      $ile=mysqli_num_rows($result);
      if($ile==0){
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
        while($row=mysqli_fetch_assoc($result)){
          echo "<tr><td>".$row['imie']."</td><td>".$row['nazwisko'].
          "</td><td>".$row['sr_ocen']."</td></tr>";
        }
echo<<<END
    <tbody>
  </table>
END;
    include 'dodaj ucznia.php';
    }
      mysqli_close($conn);
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
</body>
</html>