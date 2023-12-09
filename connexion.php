<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>
    <?php include 'include\nav.php' ?>
    <div class="container py-2">
        <?php
        if (isset($_POST['connexion'])) {

            $login = $_POST['login'];
            $pwd = $_POST['pasword'];

            if(!empty($login)&& !empty($pwd)){

                require_once 'include/database.php';

                $sql=$pdo->prepare('SELECT * FROM utilisateur 
                                    WHERE login=? AND password=?');
                
                $sql->execute([$login,$pwd]);

                if($sql->rowCount()>=1){
                   $_SESSION['utilisateur']=$sql->fetch();
                   header('localhost: admin.php');
                }else {
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Login ou password incorrectes!
                        </div>
                        <?php
                } 
                }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Login,password sont obligatoires!
                    </div>
                    <?php
                }
        }
?>
        <h4>Connexion</h4>
        <form method="post">
            <label class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="pasword">
            <input type="submit" value="connexion" name="connexion" class="btn btn-primary my-2">
        </form>
    </div>
</body>

</html>