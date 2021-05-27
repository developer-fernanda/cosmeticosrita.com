<!-- LISTA DE ITENS ADICIONADOS AO CARRINHO -->
<?php

// verificaUsuario();

include("conexao.php");
include("logica-login-cliente.php");

verificaSeClienteEstaLogado();

$recebe_email = pegaEmailDoClienteLogado();
$select_carrinho = "select * from carrinho inner join produtos on produtos.id_produto = carrinho.id_produto inner join cliente on cliente.id_cliente = carrinho.id_cliente where email_cliente =  '$recebe_email'";


$resultado = mysqli_query($conexao, $select_carrinho);

//Total da compra
$select_totalCarrinho = "Select sum(preco_produto * 1) as total_carrinho from carrinho inner join produtos on produto.id_produto = carrinho.id_produto inner join cliente on cliente.id_cliente = carrinho.id_cliente where email_cliente =  '$recebe_email' ";

$resultado_total = mysqli_query($conexao, $select_totalCarrinho);
$total_carrinho = mysqli_fetch_assoc($resultado_total);

?>

<!DOCTYPE html>
<html lang="br">

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body id="background-carrinho">
    <div class="container"  id="container-carrinho">
        <div class="row m-5">
            <div class="col-md-12 mt-4">

                <!--Inicio Pesquisar-->
                <div class="d-flex text-center mt-5 mb-2 mr-2">
                    <h2 class="ml-2" style="color: palevioletred;"> <i class="fas fa-shopping-cart"></i> Consulte seu Carrinho | <a href="logout-cliente.php" style="color:rgba(72, 166, 221, 0.781); text-decoration: none;">Sair</a></h2>
                </div>
                <!--Fim dos botões-->
                <div class="d-flex justify-content-between mt-5 mb-2 mr-2">
                    <div class="form-row col-md-6">
                        <div class="form-group col-md-3">
                            <label for="exampleInputTotal"> Valor Total</label>
                            <input type="text" class="form-control" name="txttotal" value='<?php echo number_format($total_carrinho['total_carrinho'], 2); ?>' readonly>
                        </div>
                    </div>

                    <div style="margin-top: 30px;">
                        <a href="lista-produto.php" class="btn " role="button" style="background-color: palevioletred; color:white; border-radius: 30px;"> Voltar </a>
                        <a target="_blank"href="relatorio_venda.php?id_venda=<?php echo $id_venda; ?>" class="btn " role="button" style="background-color: rgba(72, 166, 221, 0.781); color:white; border-radius: 30px;">
                        <i class="fas fa-print"></i> Imprimir </a>
                    </div>

                </div>

                <!--Inicio da Tabela-->
                <table class="table table-borderless table-responsive-md table-hover text-center" >
                    <thead>
                        <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F">
                            <th>PRODUTO</th>
                            <th>DESCRIÇÃO</th>
                            <th>PREÇO</th>
                            <th>FOTO</th>
                            <th>REMOVER DO CARRINHO</th>

                        </tr>
                    </thead>

               <!--Estrutura de repetição, que vai executar de acordo com a quantidade de registros armazenados no fetch_array-->
                    <?php while ($lista_carrinho = mysqli_fetch_assoc($resultado)) { ?>
                        <!--Organiza os dados em formato de array-->
                        <tbody class="text-center">
                            <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F">
                                <!--ele localiza pela nome da variavél-->
                                <td><?php echo $lista_carrinho['nome_produto']; ?></td>
                                <td><?php echo $lista_carrinho['descricao_produto']; ?></td>
                                <td><?php echo $lista_carrinho['preco_produto']; ?></td>
                                <td>
                                    <img src="<?php echo $lista_carrinho['foto_produto']; ?>" width='50px' heigth='50px'>
                                </td>
                                <td class="text-center">
                                    <a href="deleta_produto_carrinho.php?id_carrinho=<?php echo $lista_carrinho['id_carrinho']; ?>" role="button">
                                    <i class="far fa-trash-alt" style="color:palevioletred ; font-size: 30px;"></i> </a>

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