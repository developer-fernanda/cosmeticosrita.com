<?php

include("conexao.php");
include("logica-cad-cliente.php");
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
    <div class="container-fluid" id="background-cadastro">

        <section id="login">

            <form name="frmlogin" method="post">
                <h1 class="mb-3">Cadastro de cliente</h1>
                <label for="txtnome_cliente"> Nome </label>
                <input type="text" class="form-control" name="txtnome_cliente" placeholder="Seu usuário" required>

                <label for="txtemail_cliente" class="mt-3"> E-mail </label>
                <input type="email" class="form-control" name="txtemail_cliente" placeholder="Seu melhor email" required>

                <label for="txtsenha_cliente" class="mt-3"> Senha </label>
                <input type="password" class="form-control" name="txtsenha_cliente" placeholder="Sua senha" required>

                <div class="align-between">
                    <a href="index.php" class="btn btn-Voltar pt-2">Voltar</a>
                    <button class="btn-cadastrar" type="submit" value="entrar">Cadastrar-se</button>
                </div>

                <?php
                if ($_POST) {
                    cadastraCliente($conexao);
                }

                ?>
            </form>


        </section>
    </div>
</body>

</html>