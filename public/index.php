<?php
$page = $_GET['page'] ?? 'home'; // Page par défaut : home

switch ($page) {
    case 'home':
        require __DIR__ . '/../views/home.php'; // Page d'accueil
        break;
    case 'velos':
        require __DIR__ . '/../views/velos.php'; // Page des vélos
        break;
    case 'produit_detail':
        require __DIR__ . '/../views/produit_detail.php'; // Page des détails du produit
        break;
    case 'commander':
        require __DIR__ . '/../views/commander.php'; // Page de commande
        break;
    default:
        echo "<h1>Page non trouvée</h1>";
        break;
}
