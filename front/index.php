<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet" type="text/css">    
    <title>Accueil</title>
</head>

<body>
    <?php include '../include/nav_front.php' ?>
    <div class="container py-2">
        <h4><i class="fa-solid fa-list"></i> Listes de categories</h4>
        <?php
        require_once '../include/database.php';
        $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
        //var_dump($categories);
        

        ?>
        <ul class="list-group list-group-flush">
            <?php
            foreach ($categories as $categorie) {
                ?>
                <li class="list-group-item">
                    <a class="btn btn-light" href="categorie?id_cat=<?php echo $categorie->id_cat ?>">
                       <i class="<?php echo $categorie->icone ?>"></i> <?php echo $categorie->libelle ?>
                    </a>
                </li>
                <?php
            }
            ?>

        </ul>

    </div>
</body>

</html>