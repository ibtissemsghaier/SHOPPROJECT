<div>
    <?php 
        $idUtilisateur =$_SESSION['utilisateur']['id_user'];
        $qty= $_SESSION['panier'][$idUtilisateur][$id]?? 0;
        $button= $qty == 0 ? 'Ajouter': 'Modifier' ;
       
    
    ?>
<form method="post" class="counter d-flex" action="ajouter_panier.php">
    <button onclick="return false;" class="btn btn-primary mx-1 counter-plus">+</button>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input class="form-control" value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
    <button onclick="return false;" class="btn btn-primary mx-1 counter-minus">-</button>
    <input class="btn btn-success" type="submit" value="<?php echo $button; ?>" name="ajouter">
</form>
</div>
