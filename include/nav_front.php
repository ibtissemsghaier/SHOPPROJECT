<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Garden</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Liste des cathegorie</a>
                </li>
            </ul>
        </div>
        <?php 

            $idUtilisateur = $_SESSION['utilisateur']['id_user'];
        ?>
        <a class="btn float-end " href="panier.php"><i class="fa-solid fa-basket-shopping"></i>Pannier (<?php echo count($_SESSION['panier'][$idUtilisateur]) ?>)</a>
    </div>
</nav>