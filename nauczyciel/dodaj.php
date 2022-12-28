<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volcano - Twój dziennik elektroniczny</title>
    <link rel="stylesheet" href="../Styles/uczen.css?v=1.1">
    <script>
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = `${yyyy + '-' + mm + '-' + dd}`;
        console.log(today);
        document.getElementById('data').value = String(today);
    </script>
</head>
<body>
    <?php
    require_once '../start.php';
    ?>
    <div id="baner">
        <div id="links">
            <a href="#">Organizacja</a>
            <a href="#">Uczeń</a>
            <a href="#">Ankiety</a>
            <a href="#">Ustawienia</a>
            <a href="#">Pomoc</a>
            <a href="../wyloguj.php">Wyloguj</a>
        </div>
    </div>
    <div id="baner2">
        <div id="logo">
            <img src="../Logo.png" alt="logo">
        </div>
        <div id="menu">
            <div class="icon"><a href="dodajoceny.php"><img src="./icons/Oceny.png" alt="Oceny"></a></div>
            <div class="icon"><a href="#"><img src="./icons/Frekwencja.png" alt="Frekwencja"></a></div>
            <div class="icon"><a href="#"><img src="./icons/Wiadomosci.png" alt="Wiadomości"></a></div>
            <div class="icon"><a href="#"><img src="./icons/Ogloszenia.png" alt="Ogłoszenia"></a></div>
            <div class="icon"><a href="#"><img src="./icons/Zadania domowe.png" alt="Zadania Domowe"></a></div>
        </div>
    </div>
    <div id="main">
        <?php
            require_once "../start.php";
            $result = $link->query("SELECT `imie`, `nazwisko`, `id` FROM `users` WHERE `id` = '$_GET[id]'");
            while($row = $result->fetch_array()){
                echo $row[0]." ".$row[1];
            }
        ?>
        <form method="post">
            ocena:
            <input type="number" name="ocena">
            waga:
            <input type="number" name="waga" min='1' max='10'>
            <input type="date" name="data" value="" id="data">
            <textarea name="komentarz"></textarea>
            <Input type="submit" value="Dodaj ocene"></Input>
        </form>
        <?php
            if(isset($_POST['ocena'])){
            $data = strval($_POST['data']);
            $link->query("INSERT INTO `ocena`(`id`, `ocena`, `waga`, `data`, `komentarz`, `nauczycielID`) VALUES (null, '$_POST[ocena]','$_POST[waga]', '$data','$_POST[komentarz]', '$_SESSION[userID]')");
            $result = $link->query("SELECT id FROM ocena ORDER BY id DESC LIMIT 1;");
            $row = $result->fetch_array();
            $link->query("INSERT INTO `oceny`(`userID`, `OcenaID`) VALUES ('$_GET[id]','$row[0]')");
            }
        ?>
    </div>
    <div id="stopka">
        <hr />
    </div>
</body>
</html>