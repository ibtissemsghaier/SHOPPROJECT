<?php
session_start();
require_once '../include/database.php';
$id = $_GET['id_produit'];
$sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_produit=?");
$sqlState->execute([$id]);
$produit = $sqlState->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet"
        type="text/css">
        <link href="../asset/css/produit.css" rel="stylesheet" type="text/css">
        
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <title>Produit | <?php echo $produit['libelle'] ?></title>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <h4><?php echo $produit['libelle'] ?></h4>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img img-fluid w-75" src="../upload/produit/<?php echo $produit['image'] ?>"
                     alt="<?php echo $produit['libelle'] ?>">
            </div>
            <div class="col-md-6">
                <?php
                $discount = $produit['discount'];
                $prix = $produit['prix'];
                ?>
                <div class="d-flex align-items-center">
                    <h1 class="w-100"><?php echo $produit['libelle'] ?></h1>
                    <?php if (!empty($discount)) {
                        ?>
                        <span class="badge text-bg-success">- <?php echo $discount ?> %</span>
                        <?php
                    } ?>
                </div>
                <hr>

                <p class="text-justify">
                    <?php echo $produit['description'] ?>
                </p>
                <hr>
                <div class="d-flex">
                    <?php
                    if (!empty($discount)) {
                        $total = $prix - (($prix * $discount) / 100);
                        ?>
                        <h5 class="mx-1">
                            <span class="badge text-bg-danger"><strike> <?php echo $prix ?> <i class="fa fa-solid fa-dollar"></i> </strike></span>
                        </h5>
                        <h5 class="mx-1">
                            <span class="badge text-bg-success"><?php echo $total ?> <i class="fa fa-solid fa-dollar"></i></span>
                        </h5>

                        <?php
                    } else {
                        $total = $prix;
                        ?>
                        <h5>
                            <span class="badge text-bg-success"><?php echo $total ?> <i class="fa fa-solid fa-dollar"></i></span>
                        </h5>

                        <?php
                    }
                    ?>

                </div>
                <hr>
                    <?php
                    $idProduit = $produit['id_produit'];
                    include '../include/front/counter.php'?>
                <hr>
            </div>
        </div>
    </div>
</div>
</body>
</html>
