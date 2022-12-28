<?php
require_once '../start.php';
if(!isset($_POST['login'])) {
    header("Location: main.php");
    exit();
}

if(empty($_POST['login']) || empty($_POST['pass'])){
    $_SESSION['error'] = "Należy wypełnić wszystkie dane";
    header("Location: main.php");
    exit();
}

$login = $_POST['login'];
$pass = $_POST['pass'];
$pass = $pass;

$result = $link->query("SELECT * FROM users WHERE login = '$login' AND password = '$pass'");
if($result->num_rows == 0) {
    $_SESSION['error'] = "Nieprawidłowy login i/lub hasło";
    header("Location: main.php");
    exit();
} else {
    $row = $result->fetch_array();
    $_SESSION['userID'] = $row[0];
    header("Location: uczen.php");
    exit();
}
?>