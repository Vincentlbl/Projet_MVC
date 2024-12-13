<?php
// Connexion à la base de données
$pdo = new PDO('mysql:host=localhost;dbname=smartbike;charset=utf8', 'root', '');

// Récupération du dernier produit ajouté
$query = $pdo->query('SELECT * FROM produits ORDER BY date_ajout DESC LIMIT 1');
$dernierProduit = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/public/assets/css/styles.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Accueil - Smartbike</title>
</head>
<body class="bg-gray-100 text-gray-900">

    <?php require __DIR__ . '/partials/header.php'; ?>

    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Bienvenue chez Smartbike</h1>
        
        <!-- Section présentation -->
        <section class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Qui sommes-nous ?</h2>
            <p class="text-gray-700 leading-relaxed">
                Chez <strong>Smartbike</strong>, nous sommes passionnés par les vélos et par les solutions de mobilité durable. 
                Depuis notre création, nous nous engageons à offrir des vélos de haute qualité, adaptés aux besoins des amateurs comme des professionnels.
            </p>
        </section>

        <section class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Nos valeurs</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Durabilité et respect de l'environnement</li>
                <li>Innovation dans la conception et la technologie</li>
                <li>Satisfaction client avant tout</li>
            </ul>
        </section>

        <section class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Nos services</h2>
            <p class="text-gray-700 leading-relaxed">
                Nous proposons une gamme complète de vélos électriques et classiques, ainsi que des accessoires pour améliorer votre expérience. 
                Notre équipe est également disponible pour offrir des conseils personnalisés et un service après-vente de qualité.
            </p>
        </section>

        <!-- Section Dernier Vélo Ajouté -->
        <?php if ($dernierProduit): ?>
        <section class="bg-white shadow-md rounded p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Dernier Vélo Ajouté</h2>
            <div class="flex items-center">
                <img src="/Projet_MVC/public/<?= htmlspecialchars($dernierProduit['image']); ?>" 
                     alt="<?= htmlspecialchars($dernierProduit['nom']); ?>" 
                     class="w-48 h-48 object-cover rounded mr-6">
                <div>
                    <h3 class="text-xl font-bold"><?= htmlspecialchars($dernierProduit['nom']); ?></h3>
                    <p class="text-gray-700 leading-relaxed"><?= htmlspecialchars($dernierProduit['description']); ?></p>
                    <p class="text-green-500 font-bold text-lg mt-4">Prix : <?= number_format($dernierProduit['prix'], 2); ?> €</p>
                    <a href="/Projet_MVC/public/?page=produit_detail&id=<?= $dernierProduit['id']; ?>" 
                       class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 inline-block mt-4">Voir plus</a>
                </div>
            </div>
        </section>
        <?php else: ?>
        <p class="text-red-500">Aucun produit ajouté pour le moment.</p>
        <?php endif; ?>

        <!-- Section Contact -->
        <section class="bg-white shadow-md rounded p-6">
            <h2 class="text-2xl font-semibold mb-4">Contactez-nous</h2>
            <p class="text-gray-700 leading-relaxed">
                Adresse : 123 Rue Imaginaire, Paris, France<br>
                Téléphone : <a href="tel:+33123456789" class="text-blue-500 hover:underline">01 23 45 67 89</a><br>
                Email : <a href="mailto:contact@smartbike.com" class="text-blue-500 hover:underline">contact@smartbike.com</a>
            </p>
        </section>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>
