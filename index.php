<?php    session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['login'])){
            if (isset($_POST['acao']) ){
                $login = 'bio';
                $senha = '123';

                $loginForm = $_POST['login'];
                $senhaForm = $_POST['senha'];

                if($login == $loginForm && $senha == $senhaForm){
                    //logado com suscesso
                    $_SESSION['login'] = $login;
                    header('location: index.php');
                }else {
                    //algum erro ocorreu
                    echo 'Dados Inválidos';
                }
            }

            include ('login.php');
        }else {
            if (isset($_GET['logout'])) {
                unset($_SESSION['login']);
                session_destroy();
                header('location: index.php');
            }
            include ('home.php');
        }
    ?>
</body>
</html>