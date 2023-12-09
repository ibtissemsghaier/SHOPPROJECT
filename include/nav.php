<?php
session_start();
$connecter = false;
if (isset($_SESSION['utilisateur'])) {
    $connecter = true;
}
//var_dump($connecter);
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Garden</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Ajouter Utilisateur</a>
                </li>
                <?php
                if ($connecter) {


                ?>
                <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="categories.php">Listes Des Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="produits.php">Listes Des Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="ajouter_categorie.php">Ajouter Catégorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="ajouter_produit.php">Ajouter Produit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">Déconnexion</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                    </li>
                <?php

                }

                ?>
            </ul>
        </div>
    </div>
</nav>