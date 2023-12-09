<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>modifier Produits</title>
</head>

<body>
    <?php
    require_once 'include/database.php';
    include 'include\nav.php'
        ?>
    <div class="container py-2">
        <h4>Modifier Produit </h4>
        <?php
        $id = $_GET['id_produit'];
        $req = $pdo->prepare('SELECT * FROM produit WHERE id_produit=?');
        $req->execute([$id]);
        $produit = $req->fetch(PDO::FETCH_ASSOC);
        //var_dump($produit);
        if (isset($_POST['modifier'])) {
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $discount = $_POST['discount'];
            //date de creation donc c'est pas evidant
            //$date = date('Y-m-d');
            $categorie = $_POST['categorie'];
            $description = $_POST['description'];

            $filename = '';
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image']['name'];
                $filename = uniqid() . $image;
                //si l'image a ete uploaded et le met and upload/produit         uniqid pour eviter l'ecrasement d'une img si y a 2 img de m nom 
                move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/' . $filename);

            }


            //echo "Libelle : $libelle , prix : $prix , discount : $discount , categorie : $categorie , date : $date ";
            if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
                
                //si il a changer la photos
                if (!empty($filename)) {
                    $query = "UPDATE produit SET libelle=?, prix=?,discount=?,id_cat=?,description=?,image=? WHERE id_produit=?";
                    $sql = $pdo->prepare($query);
                    $sql->execute([$libelle, $prix, $discount, $categorie, $description,$filename, $id]);
                }else{
                    $query = "UPDATE produit SET libelle=?, prix=?,discount=?,id_cat=?,description=? WHERE id_produit=?";
                    $sql = $pdo->prepare($query);
                    $sql->execute([$libelle, $prix, $discount, $categorie, $description, $id]);
                
                }

                header('location: produits.php');

            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Libelle,prix,description sont obligatoires!!
                </div>
                <?php
            }
        }



        ?>
        <form method="post" enctype="multipart/form-data">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle" value="<?php echo $produit['libelle'] ?>">

            <label class="form-label">Prix</label>
            <input type="number" class="form-control" step="0.1" name="prix" value="<?php echo $produit['prix'] ?>">

            <label class="form-label">Discount</label>
            <input type="number" class="form-control" name="discount" value="<?php echo $produit['discount'] ?>">

            <label class="form-label">Description</label>
            <textarea class="form-control" name="description"><?php echo $produit['description'] ?></textarea>

            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">
            <img width="250px" class="img img-fluid" src="upload/produit/<?php echo $produit['image'] ?>"><br>

            <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($produit['id_cat']);
            ?>
            <label class="form-label">Catégorie</label>
            <select name="categorie" class="form-control">
                <option value="">Choisissez une catégorie</option>
                <?php
                foreach ($categories as $categorie) {
                    //test si lid cat de produit selectonnée egale au id cat
                    if ($produit['id_cat'] == $categorie['id_cat']) {
                        //option selectionée valide
                        echo "<option value='" . $categorie['id_cat'] . "'>" . $categorie['libelle'] . "</option>";
                    } else {
                        echo "<option value='" . $categorie['id_cat'] . "'>" . $categorie['libelle'] . "</option>";

                    }

                }
                ?>

            </select>



            <input type="submit" value="Modifier produit" name="modifier" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>