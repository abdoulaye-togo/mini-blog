<?php
require_once "connexion.php";

if (!isset($_GET["id"])) {
    die("ID de l'article manquant.");
}

$id = $_GET["id"];

$sql = "DELETE FROM articles WHERE id = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ":id" => $id
]);

header("Location: index.php");
exit;
?>