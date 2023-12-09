<?php
//var_dump($_GET);
require_once 'include/database.php';
$id = $_GET['id_cat'];
$req = $pdo->prepare('DELETE FROM categorie WHERE id_cat=?');
$supp = $req->execute([$id]);
if ($supp) {
    header('location:categories.php');

} else {
    echo "data error";
}

?>