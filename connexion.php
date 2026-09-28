<?php

$host = "localhost";
$dbname = "mini_blog";
$username = "root";
$password = "";

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password
    );

    $pdo->setATTRIBUTE(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de cnnexion : " . $e->getMessage());
}
?>
