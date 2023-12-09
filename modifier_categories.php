<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Modifier catégorie</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <h4>Modifier catégorie </h4>
        <?php
        require_once 'include/database.php';
        $req = $pdo->prepare('SELECT * FROM categorie WHERE id_cat=?');
        $id = $_GET['id_cat'];
        $req->execute([$id]);
        //affichage des produits
        $categorie = $req->fetch(PDO::FETCH_ASSOC);
        if (isset($_POST['modifier'])) {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];
            if (!empty($libelle) && !empty($description)) {
              
                $sql = $pdo->prepare('UPDATE categorie SET libelle=? , description=?,icone=? WHERE id_cat=?');
                $sql->execute([$libelle, $description,$icone,$id]);
                header('location:categories.php');

            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Libelle , description sont obligatoires!
                </div>
                <?php

            }
        }

        ?>
        <form method="post">


            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $categorie['libelle'] ?>">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"><?php echo $categorie['description'] ?></textarea>
            <label class="form-label">Icone</label>
            <input type="text" class="form-control" name="icone" value="<?php echo $categorie['icone'] ?>">
            <input type="submit" value="Modifier catégorie" name="modifier" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>