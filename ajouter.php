```php
<?php
require_once "connexion.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre = $_POST["titre"];
    $contenu = $_POST["contenu"];
    $auteur = $_POST["auteur"];

    $sql = "INSERT INTO articles (titre, contenu, auteur)
            VALUES (:titre, :contenu, :auteur)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ":titre" => $titre,
        ":contenu" => $contenu,
        ":auteur" => $auteur
    ]);

    $message = "Article ajouté avec succès !";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>

<body>

    <h1>Ajouter un article</h1>

    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>

    <form method="POST">

        <label>Titre :</label><br>
        <input type="text" name="titre" required><br><br>

        <label>Contenu :</label><br>
        <textarea name="contenu" required></textarea><br><br>

        <label>Auteur :</label><br>
        <input type="text" name="auteur" required><br><br>

        <button type="submit">Ajouter l'article</button>

    </form>

    <br>

    <a href="index.php">Retour aux articles</a>

</body>
</html>
```
