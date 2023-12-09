<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter Produits</title>
</head>

<body>
    <?php
    require_once 'include/database.php';
    include 'include\nav.php'
    ?>
    <div class="container py-2">
        <h4>Ajouter Produit </h4>
        <?php
        if (isset($_POST['ajouter'])) {
            $libelle = $_POST['libelle'];
            $prix = $_POST['prix'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $date = date('Y-m-d');
            $categorie = $_POST['categorie'];

           
            //photo par defaut
            $filename='produit.png';
            if(!empty($_FILES['image']['name'])){
                $image=$_FILES['image']['name'];
                $filename=uniqid().$image;
                //si l'image a ete uploaded et le met and upload/produit         uniqid pour eviter l'ecrasement d'une img si y a 2 img de m nom 
                move_uploaded_file($_FILES['image']['tmp_name'],'upload/produit/'.$filename);
              
            }
            
            
            
            
            //echo "Libelle : $libelle , prix : $prix , discount : $discount , categorie : $categorie , date : $date ";
            if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
                $sql = $pdo->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?)');
                $sql->execute([$libelle, $prix, $discount,$date , $categorie,$description,$filename]);
                header('location: produits.php');

        } else {
        ?>
            <div class="alert alert-danger" role="alert">
                Libelle,prix,description sont obligatoires!!
            </div>
        <?php
        }
    }


        // pour l'importation d'un fichier enctype="multipart/form-data"
        ?>
        <form method="post" enctype="multipart/form-data">
            <label class="form-label">Libelle</label>
            <input type="text" class="form-control" name="libelle">

            <label class="form-label">Prix</label>
            <input type="number" class="form-control" step="0.1" name="prix">

            <label class="form-label">Discount</label>
            <input type="number" class="form-control" name="discount">

            <label class="form-label">Description</label>
            <textarea  class="form-control" name="description"></textarea>

            <label class="form-label">Image</label>
            <input type="file" class="form-control" name="image">

            <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <label class="form-label">Catégorie</label>
            <select name="categorie" class="form-control">
                <option value="">Choisissez une catégorie</option>
                <?php
                foreach ($categories as $categorie) {
                    echo "<option value='" . $categorie['id_cat'] . "'>" . $categorie['libelle'] . "</option>";
                }
                ?>

            </select>



            <input type="submit" value="Ajouter produit" name="ajouter" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>