<?php
class Router {
    public function dispatch() {
        $page = $_GET['page'] ?? 'produits';

        switch ($page) {
            case 'produits':
                include __DIR__ . '/../views/produits.php'; // Assurez-vous que produits.php existe ici
                break;
            case 'produit_detail':
                include __DIR__ . '/../views/produit_detail.php'; // Assurez-vous que produit_detail.php existe
                break;
            case 'commander':
                include __DIR__ . '/../views/commander.php'; // Assurez-vous que commander.php existe
                break;
            default:
                echo "<p>Page non trouvée.</p>";
                break;
        }
    }
}
