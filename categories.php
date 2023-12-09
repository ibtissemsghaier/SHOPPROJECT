<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">    
    
    <title>Listes Des Catégorie</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <h2>Listes Des Catégorie</h2>
        


        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#ID_cat</th>
                    <th>Libelle</th>
                    <th>Description</th>
                    <th>Icone</th>
                    <th>Date creation</th>
                    <th>Opération</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'include/database.php';
                $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $categorie) {
                ?>
                    <tr>
                        <td><?php echo $categorie['id_cat'] ?></td>
                        <td><?php echo $categorie['libelle'] ?></td>
                        <td><?php echo $categorie['description'] ?></td>
                        <td><i class="<?php echo $categorie['icone'] ?>"></i> </td>
                        <td><?php echo $categorie['date_creation'] ?></td>
                        <td>
                            
                            <a href="modifier_categories.php?id_cat=<?php echo $categorie['id_cat'] ?>" class="btn btn-primary">modifier</a>
                            <a href="supprimer_categories.php?id_cat=<?php echo $categorie['id_cat'] ?>" onclick="return confirm('voulez vous vraiment supprimer la categorie <?php echo $categorie['libelle'] ?> ?')" class="btn btn-danger">supprimer</a>
                        </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>




        </table>
        <a href="ajouter_categorie.php" class="btn btn-primary">ajouter Categorie</a>
        
    </div>
</body>

</html>