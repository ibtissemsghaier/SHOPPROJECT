<?php
// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$motDePasse = "";
$nomBaseDeDonnees = "garden";

try {
    // Création de la connexion PDO nov objet
    $pdo = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees;charset=utf8", $utilisateur, $motDePasse);

    // Activer les rapports d'erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

?>