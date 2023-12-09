<?php
session_start();
require_once '../include/database.php';
$id = $_GET['id_cat'];
$req = $pdo->prepare("SELECT * FROM categorie WHERE id_cat=?");
$req->execute([$id]);
$categorie = $req->fetch(PDO::FETCH_ASSOC);
//var_dump($categorie);

$req = $pdo->prepare("SELECT * FROM produit WHERE id_cat=?");
$req->execute([$id]);
$produits = $req->fetchAll(PDO::FETCH_ASSOC);
//var_dump($produit);
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

    <title>categorie |
        <?php echo $categorie['libelle'] ?>
    </title>
</head>

<body>
    <?php include '../include/nav_front.php' ?>

    <div class="container py-2">
    <h4><?php echo $categorie['libelle'] ?><span class="fa <?php echo $categorie['icone'] ?>"></span> </h4>
        <div class="container">
            <div class="row">
                <?php
                foreach ($produits as $produit) {
                    $idProduit=$produit['id_produit'] ;
                    ?>
                    <div class="card mb-3 m-3" style="width: 25rem;">
                        <img class="card-img-top w-50 mx-auto" src="../upload/produit/<?php echo $produit['image'] ?>"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="produit.php?id_produit=<?php echo $idProduit ?>"
                                    class="btn stretched-link">Afficher details</details> </a>
                                <?php echo $produit['libelle'] ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $produit['discount'] ?>%
                            </p>
                            <p class="card-text">
                                <?php echo $produit['description'] ?>
                            </p>
                            <p class="card-text"><small class="text-body-secondary">
                                    <?php echo date_format(date_create($produit['date_creation']), 'Y/M/D') ?>
                                </small></p>
                        </div>
                        <div class="card-footer" style="z-index:10">
                           <?php include '../include/front/counter.php'?>
                        </div>
                    </div>
                    <?php
                }
                if (empty($produits)) {
                    ?>
                    <div class="alert alert-info" role="alert">
                        Pas de produits pour l'instant!
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</body>
<script src="../asset/js/produit/counter.js"></script>

</html>