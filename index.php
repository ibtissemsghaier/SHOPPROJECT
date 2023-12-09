<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Accueil</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <h4>Ajouter utilisateur</h4>
        <?php
        if (isset($_POST['ajouter'])) {
            $login = $_POST['login'];
            $pwd = $_POST['pasword'];
            //ken les champs maamrin
            if (!empty($login) && !empty($pwd)) {
                require_once 'include/database.php';
                $date = date('Y-m-d');
                //var_dump($date);
                $sql=$pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?) ');
                $sql->execute([$login, $pwd,$date]);
                //redirection:page de connexion
                header('localhost: connexion.php');
            } else { //mouch maamrin 
        ?>

                <div class="alert alert-danger" role="alert">
                Login,password sont obligatoires!
                </div>
        <?php
              
            }

        }
        ?>
        <form method="post">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pasword">
            <input type="submit" value="Ajouter utilisateur" name="ajouter" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>