<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=smartbike;charset=utf8', 'root', '');

// Récupération de l'ID du produit depuis l'URL
$id = $_GET['id'] ?? null;
if ($id) {
    $query = $pdo->prepare('SELECT * FROM produits WHERE id = :id');
    $query->execute(['id' => $id]);
    $produit = $query->fetch(PDO::FETCH_ASSOC);
}

if (!$produit) {
    echo "<h1>Produit introuvable</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/assets/css/styles.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title><?= htmlspecialchars($produit['nom']); ?> - Détails</title>
</head>
<body class="bg-gray-100 text-gray-900">

    <?php require __DIR__ . '/partials/header.php'; ?>

    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6"><?= htmlspecialchars($produit['nom']); ?></h1>
        <div class="bg-white shadow-md rounded p-6">
            <img src="/Projet_MVC/public/<?= htmlspecialchars($produit['image']); ?>" 
                 alt="<?= htmlspecialchars($produit['nom']); ?>" 
                 class="w-full h-64 object-cover rounded mb-4">
            <p class="text-gray-700 text-lg mb-4"><?= htmlspecialchars($produit['description']); ?></p>
            <p class="text-green-500 font-bold text-xl mb-4">Prix : <?= number_format($produit['prix'], 2); ?> €</p>
            <a href="/Projet_MVC/public/?page=commander&id=<?= $produit['id']; ?>" 
               class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Commander</a>
        </div>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
