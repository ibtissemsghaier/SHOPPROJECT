<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Admin</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <?php
        if(!isset($_SESSION['utilisateur'])){
            header('localhost: connexion.php');
        }
        
        ?>


        <h3>Bonjour  <?php 
           // var_dump($_SESSION['utilisateur']['login']);
        ?></h3>
    </div>
</body>

</html>