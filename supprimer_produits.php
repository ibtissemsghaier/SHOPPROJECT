<?php
//var_dump($_GET);
require_once 'include/database.php';
$id = $_GET['id_produit'];
$req = $pdo->prepare('DELETE FROM produit WHERE id_produit=?');
$supp = $req->execute([$id]);
if ($supp) {
    header('location:produits.php');

} else {
    echo "data error";
}

?>