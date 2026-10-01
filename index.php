<?php
require_once "connexion.php";

$sql = "SELECT * FROM articles ORDER BY cree_le DESC";
$stmt = $pdo->query($sql);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-Blog</title>
</head>

<body>

    <h1>Mon Mini-Blog</h1>

    <a href="ajouter.php">Ajouter un nouveau article</a>

    <hr>

    <?php foreach ($articles as $article): ?>

        <article>
            <h2><?= htmlspecialchars($article['titre']) ?></h2>

            <p><?= htmlspecialchars($article['contenu']) ?></p>

            <p>
                Auteur : <?= htmlspecialchars($article['auteur']) ?>
            </p>

            <p>
                Date : <?= htmlspecialchars($article['cree_le']) ?>
            </p>
<a href="modifier.php?id=<?= $article['id'] ?>">Modifier</a>
|
<a href="supprimer.php?id=<?= $article['id'] ?>"
   onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">
   Supprimer
</a>

            <hr>
        </article>

    <?php endforeach; ?>

</body>
</html>