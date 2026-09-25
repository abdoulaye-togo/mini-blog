<?php
require_once "connexion.php";

if (!isset($_GET["id"])) {
    die("ID de l'article manquant.");
}

$id = $_GET["id"];

$sql = "SELECT * FROM articles WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id" => $id]);

$article = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$article) {
    die("Article introuvable.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $auteur = $_POST["auteur"];

    $sql = "UPDATE articles
            SET titre = :titre, contenu = :contenu, auteur = :auteur
            WHERE id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":titre" => $titre,
        ":contenu" => $contenu,
        ":auteur" => $auteur,
        ":id" => $id
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>
</head>

<body>

    <h1>Modifier l'article</h1>

    <form method="POST">

        <label>Titre :</label><br>
        <input
            type="text"
            name="titre"
            value="<?= htmlspecialchars($article['titre']) ?>"
            required
        >
        <br><br>

        <label>Contenu :</label><br>
        <textarea name="contenu" required><?= htmlspecialchars($article['contenu']) ?></textarea>
        <br><br>

        <label>Auteur :</label><br>
        <input
            type="text"
            name="auteur"
            value="<?= htmlspecialchars($article['auteur']) ?>"
            required
        >
        <br><br>

        <button type="submit">Enregistrer les modifications</button>

    </form>

    <br>

    <a href="index.php">Retour aux articles</a>

</body>
</html>