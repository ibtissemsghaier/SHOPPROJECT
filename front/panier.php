<?php
session_start();
require_once '../include/database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link href="../asset/css/produit.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Panier |</title>
</head>
<body>
    <?php include '../include/nav_front.php' ?>
    <div class="container py-2">
        <h4>Panier</h4>
        <div class="container">
            <div class="row">
                <?php
                $idUtilisateur = $_SESSION['utilisateur']['id_user'];
                $panier=$_SESSION['panier'][$idUtilisateur];
                $id = array_keys($panier);
                $id=implode(',',$id);
                $produits=$pdo ->query('SELECT * From produit WHERE id_produit IN ($produits)')->fetchAll(PDO::FETCH_ASSOC);
               var_dump($produits);


                if (empty($panier)) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre panier est vide!
                    </div>
                    <?php
                }else{
                    ?>
                    <ul class="list-group list-group-flush w-25">
                        <?php
                    foreach($produits as $produit){
                       ?>
                       <li class="list-group-item"></li>
                       <?php 
                    }
                    ?>
                    </ul>
                        <?php
                }
                ?>
    
            </div>
        </div>
    </div>

</body>
<script src="../asset/js/produit/counter.js"></script>

</html>