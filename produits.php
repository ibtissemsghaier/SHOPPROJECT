<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Listes Des Produits</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <h2>Listes Des Produits</h2>
        


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#ID_cat</th>
                    <th>#ID_produit</th>
                    <th>Libelle</th>
                    <th>Prix</th>
                    <th>Remise</th>
                    <th>Prix Apres Remise</th>
                    <th>Date de creation</th>
                    <th>Image</th>
                    <th>Categorie</th>
                    <th>Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'include/database.php';
                $categories = $pdo->query('SELECT produit.*,categorie.libelle as "categorie_libelle" FROM produit INNER JOIN categorie ON produit.id_cat=categorie.id_cat')->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $produit) {
                    //var_dump($categorie);
                    $prix= $produit['prix'];
                    $remise= $produit['discount'];
                    $prixFinal=$prix-(($prix*$remise)/100);
                ?>
                    <tr>
                        <td><?php echo $produit['id_cat'] ?></td>
                        <td><?php echo $produit['id_produit'] ?></td>
                        <td><?php echo $produit['libelle'] ?></td>
                        <td><?php echo $produit['prix'] ?> TDN</td>
                        <td><?php echo $produit['discount'] ?>%</td>
                        <td><?php echo $prixFinal?></td>
                        <td><?php echo $produit['date_creation'] ?></td>       
                        <td><?php echo $produit['image'] ?></td>
                        <td><img width="70px" class="img-fluid" src="upload/produit/<?php echo $produit['image'] ?>"><?php echo $produit['categorie_libelle'] ?></td>
                        <td>
                        <a href="modifier_produits.php?id_produit=<?php echo $produit['id_produit'] ?>" class="btn btn-primary">modifier</a>
                        <a href="supprimer_produits.php?id_produit=<?php echo $produit['id_produit'] ?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $produit['libelle'] ?> ?')" class="btn btn-danger">supprimer</a>
                        </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>




        </table>
        <a href="ajouter_produit.php" class="btn btn-primary">ajouter Produits</a>
        
    </div>
</body>

</html>