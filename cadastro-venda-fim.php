<!-- CADASTRO - VENDA-->

<?php

include("conexao.php");
include("logica-login-cliente.php");

verificaSeClienteEstaLogado();

//RECUPERA DADOS DO CLIENTE ////////////////////////////////////////////////////////////////////////

$email = pegaEmailDoClienteLogado();

$select_cliente = "SELECT * FROM cliente WHERE email_cliente = '$email'";

$lista_cliente = mysqli_query($conexao, $select_cliente);

$dados_cliente = mysqli_fetch_array($lista_cliente);

$id_cliente = $dados_cliente['id_cliente'];


?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<body id="background-lista">
    <div class="container" id="container-lista">
        <div class="row m-5">
            <!--CABECALHO-->
            <div class="col-lg-12 mt-5 mb-3">
                <h2 class="ml-2" style="color: palevioletred;"> <i class="fas fa-leaf"></i> Venda de Produtos | <a href="logout-cliente.php" style="color:rgba(72, 166, 221, 0.781); text-decoration: none;">Sair</a></h2>
            </div>

            <!--ICONES-->
            <div class="col-lg-12 d-flex justify-content-end">
                <a href="lista-produto.php" class="btn m-1" style="border-radius:25px; font-size: 16px; background-color:rgba(24, 143, 212, 0.781); color:white;" role="button">
                    Voltar </a>
            </div>

            <!-- CARDS-->
            <div class="row">
                <div class="col-lg-12 p-5 mx-5">
                    <div class="card card-body h-100 text-center shadow p-5">
                        <div>
                            <i class="fab fa-envira h1 mr-2"> </i>
                            <i class="fas fa-leaf h1"></i>
                        </div>

                        <h3 style="color: palevioletred;"> <?php echo $dados_cliente['nome_cliente']; ?>,
                            sua compra foi efetuada com sucesso!</h3>
                        <h4> Agradecemos pela sua preferência!</h4>
                        <div class="text-center mt-4">
                            <a href="lista-produto.php" class="btn" role="button" style="background-color: palevioletred; color:white; border-radius: 30px; height:40px; width:200px;"> Iniciar nova compra </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>