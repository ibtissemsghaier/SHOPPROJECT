<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter catégorie</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <h4>Ajouter catégorie </h4>
        <?php
            if(isset($_POST['ajouter'])){
                $libelle=$_POST['libelle'];
                $description=$_POST['description'];
                $icone=$_POST['icone'];


                if(!empty($libelle)&& !empty($description)){
                    require_once 'include/database.php';
                    $sql=$pdo->prepare('INSERT INTO categorie (libelle,description,icone) values (?,?,?)');
                    $sql->execute([$libelle,$description,$icone]);
                    header('location:categories.php');
                
                }else{
                ?>
                        <div class="alert alert-danger" role="alert">
                            Libelle , description sont obligatoires!
                        </div>
                    <?php

            }}
        ?>
        <form method="post">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control"></textarea>
            <label class="form-label">Icone</label>
            <input type="text" class="form-control" name="icone">
            <input type="submit" value="Ajouter catégorie" name="ajouter" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>