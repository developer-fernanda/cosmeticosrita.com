<?php

include("conexao.php");
include("logica-login-usuario.php");
?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container-fluid" id="background-login">

        <section id="login">

            <form name="frmlogin" method="post">
                <h1 class="mb-3">Login de Usuário</h1>
                <label for="user"> Nome de Usuário </label>
                <input type="text" class="form-control" name="txtnome_usuario" placeholder="Nome de usuário">

                <label for="pass" class="mt-3"> Senha </label>
                <input type="password" class="form-control" name="txtsenha_usuario" placeholder="Sua senha">

                <div class="align-between">
                    <a href="index.php" class="btn btn-Voltar pt-2 mr-1">Voltar</a>
                    <button class="btn-login" type="submit" value="entrar">Entrar</button>
                </div>

                <?php
                if ($_POST) {
                    logaUsuario($conexao);
                }

                ?>
            </form>


        </section>
    </div>
</body>

</html>