<?php
session_start();
//si l'utili n'est pas connecter
if (!isset($_SESSION['utilisateur'])) {
    header('location: ../connexion.php');
}

$id = $_POST['id'];
$qty = $_POST['qty'];
$idUtilisateur = $_SESSION['utilisateur']['id_user'];
//verifier si l'utilisateur a la pannier rempli
if (!isset($_SESSION['panier'][$idUtilisateur])) {
    $_SESSION['panier'][$idUtilisateur] = [];
}
//supprimer la session si la qty=0
if($qty == 0){
    unset($_SESSION['panier'][$idUtilisateur][$id]);
}else{
    //tester si il a jouter ce produit dans le pannier 
    $_SESSION['panier'][$idUtilisateur][$id] = $qty;
}

header("location:".$_SERVER['HTTP_REFERER']);
?>