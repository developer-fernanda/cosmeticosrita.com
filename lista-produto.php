<!-- LISTA DE PRODUTOS PARA VENDA -->

<?php

include("conexao.php");
include("logica-login-cliente.php");

verificaSeClienteEstaLogado();

//Recupera dados do cliente
$email = pegaEmailDoClienteLogado();

$select_cliente = "SELECT * FROM cliente WHERE email_cliente = '$email'";

$lista_cliente = mysqli_query($conexao, $select_cliente);

$dados_cliente = mysqli_fetch_array($lista_cliente);


//recupera dados do carrinho do cliente

$id_cliente = $dados_cliente['id_cliente'];

//Ele conta a quantidade de itens armazenados no carrinho do cliente
$select_carrinho = "SELECT count(*) as quantidade FROM carrinho WHERE id_cliente = $id_cliente";

$carrinho_cliente = mysqli_query($conexao, $select_carrinho);

$dados_carrinho = mysqli_fetch_array($carrinho_cliente );


//recupera dados do produto
$select_produto = "SELECT * FROM produtos";
$lista_produto = @mysqli_query($conexao, $select_produto);

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
        <div class="row m-5" >
           <div class="col-md-12 mt-4">
                <!--Inicio Pesquisar-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div>
                        <h2 class="ml-2" style="color: palevioletred;"> <i class="fas fa-leaf"></i> Venda de Produtos | <a href="logout-cliente.php" style="color:rgba(72, 166, 221, 0.781); text-decoration: none;">Sair</a></h2>
                    </div>
                    <!-- <ul class="list-inline">
                        <li class="list-inline-item">
                            <input type="text" class="form-control" name="txtpesquisa" id="exampleInputPesquisar" aria-describedby="pesquisa" placeholder="Pesquisa" style="width: 350px; border-radius: 30px;">
                        </li>
                        <li class="list-inline-item">
                            <button type="submit" class="btn" style="background-color :palevioletred; color:white; border-radius: 30px;"><i class="fas fa-search"></i> Pesquisar</button>
                        </li>
                    </ul> -->
                </div>
                <!--Fim dos botões-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div class="form-row col-md-6">
                        <div class="form-group col-md-2">
                            <label for="exampleInputCodigo">Código</label>
                            <input type="text" class="form-control" name="txtcodigo" value='<?php echo $dados_cliente['id_cliente']; ?>' readonly>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="exampleInputNome">Nome do Cliente</label>
                            <input type="text" class="form-control" name="txtdesc" value='<?php echo $dados_cliente['nome_cliente']; ?>' readonly>
                        </div>
                    </div>

                    <div style="margin-top: 30px;">
                        <a href="consultar-carrinho.php" class="btn m-1" style="border-radius:25px; font-size: 16px; background-color:palevioletred; color:white;" role="button">
                        <i class="fas fa-shopping-cart"></i> Ver Carrinho (<?php echo $dados_carrinho['quantidade']?>) </a>  
                    </div>
                </div>

                <!--Inicio da Tabela-->
                <table class="table table-borderless table-responsive-md table-hover" id="table_lista_produtos">
                    <thead>
                        <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F" class="text-center" >
                            <th>CÓDIGO</th>
                            <th>NOME</th>
                            <th>DESCRIÇÃO DO PRODUTO</th>
                            <th>PREÇO</th>
                            <th>FOTO</th>
                            <th>ADICIONAR AO CARRINHO</th>
                        </tr>

                    </thead>
                    <!--Estrutura de repetição, que vai executar de acordo com a quantidade de registros armazenados no fetch_array-->
                    <?php while ($dado = $lista_produto->fetch_array()) { ?>
                        <!--Organiza os dados em formato de array-->
                        <tbody>
                            <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F" class="text-center" >
                                <!--ele localiza pela nome da variavél-->
                                <td> <?php echo $dado['id_produto']; ?> </td>
                                <td> <?php echo $dado['nome_produto']; ?> </td>
                                <td> <?php echo $dado['descricao_produto']; ?> </td>
                                <td> <?php echo $dado['preco_produto']; ?> </td>
                                <td> <a>
                                        <img src="assets/img/<?php echo $dado['foto_produto']; ?>" width='50px' heigth='50px'>
                                    </a></td>

                                <td>
                                    <a href="cad_carrinho.php?id_produto=<?php echo $dado['id_produto']; ?>&id_cliente=<?php echo $id_cliente; ?>"  role="button">
                                        <i class="fas fa-cart-plus" style="color:palevioletred ; font-size: 35px;"></i> </a>

                                </td>
                            </tr>
                        </tbody>
                    <?php } ?>
                    <!--Fim da Tabela-->
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>

</html>