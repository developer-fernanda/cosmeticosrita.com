<?php

include('conexao.php');

?>
<!-- <a href="logout.php" class="btn btn-primary">Sair</a> -->

<!DOCTYPE html>

<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body>
    <header class="container-fluid " id="header">
        <nav class="navbar navbar-expand-lg">
            <button class="navbar-toggler" style="border: 2px solid white; color: white;" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
                <span class="navbar-toggler-icon"><i class="fas fa-bars p-1"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
                <div class="container d-flex justify-content-between">
                    <ul class="list-unstyled" style="color: white;">
                        <li>
                            <h3><i class="fas fa-leaf"></i> Rita Presentes</h3>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto" id="navegacao">
                        <li class="nav-item px-3 ">
                            <a target="_blank" href="https://clubeami.com.br/mags/2051-224724/1" id="contato" class="btn"><i class="fab fa-envira"></i> NATURA </a>
                        </li>
                        <li class="nav-item px-3 ">
                            <a target="_blank" href="https://clubeami.com.br/mags/2120-224724/1" id="contato" class="btn"><i class="fab fa-envira"></i> BOTICÁRIO </a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item px-4" id="link-header">
                                <a href="login-cliente.php" class="btn"> lOGIN
                                </a>
                                <a href="login-usuario.php" class="btn"> ADM
                                </a>
                                <a target="_blank" href="https://wa.me/551199915-3443" class="btn"> <i class="fab fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                    </form>
                </div>
            </div>
        </nav>
        <div class="row" id="frase">
            <div class="col-md-12 text-center">
                <h1> Bem-vindo!</h1>
                <h2> Faça seu cadastro e <br> aproveite as promoções! </h2>
                <a href="cadastro-cliente.php" class="btn btn-cad" style="border-radius: 25px;">
                    <i class="fab fa-whatsapp"></i> CADASTRAR
                </a>

            </div>
        </div>
    </header>
</body>