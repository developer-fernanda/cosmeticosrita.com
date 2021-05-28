<?php
//CADASTRO DE PRODUTOS
include("conexao.php");
include("logica-login-usuario.php");
include("logica-cad-produto.php");
include("deleta-produto-cad-lista.php");
verificaSeUsuarioEstaLogado();
?>


<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

</head>

<body id="background-lista">
    <div class="container" id="container-lista">
        <div class="row m-5">
            <div class="col-md-12 mt-5">
                <div class="d-flex justify-content-between">
                    <h2 style="color: palevioletred;"> <i class="fas fa-leaf"></i> Cadastro de Produtos | <a href="logout-usuario.php" style="color:rgba(72, 166, 221, 0.781); text-decoration: none;">Sair</a></h2>
                    <?php 

                    if(isset($_GET['id_produto'])){
                        deleta_produto($conexao);
                    }           

                    if ($_POST) {
                        cadastroProduto($conexao);
                    }

                    if(isset($_GET['cadastro_sucesso'])){
                        if($_GET['cadastro_sucesso']==1){
                            echo '<div class="alert alert-success text-center" role="alert" style="height: 60px; width: 350px;">
                                    <i class="fas fa-leaf h5"></i> Produto cadastrado com sucesso!
                                </div>';
                        }
                        else{
                            echo'<div class="alert alert-warning text-center" role="alert" style="height: 60px; width: 350px;">
                                    <i class="fas fa-leaf h5"></i> Produto não cadastrado!
                                </div>';
                        }
                   
                   }
                               
                    $listaProdutos = dadosProduto($conexao);
                    ?>
                </div>
                <div class="d-flex justify-content-between mt-3 mb-3">
                    <div>
                        <h4 class="mt-3">Olá, <?php echo pegaNomeDoUsuarioLogado(); ?>! </h4>
                    </div>

                    <div class="mt-2"><button class="btn" style="border-radius:25px; background-color:rgba(72, 166, 221, 0.781); color:white; " data-toggle="modal" data-target="#idmodal
                    "><i class="fas fa-plus"></i> Cadastro </button>

                        <a href="cadastro-produto.php" class="btn" style="border-radius:25px; background-color:rgba(72, 166, 221, 0.781); color:white;"> <i class="fas fa-redo-alt"></i> Atualizar</a>
                    </div>
                </div>

                <!-- MODAL -->
                <div class="modal fade" id="idmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" id="modal-color">
                            <!-- TÍTULO MODAL -->
                            <div class="modal-header" style="margin: auto;">
                                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro de Produto</h5>
                            </div>

                            <!-- CONTEÚDO MODAL -->
                            <form name="frmlogin" method="post">
                                <div class="modal-body">

                                    <label for="txtnome_produto"> Nome do Produto </label>
                                    <input type="text" class="form-control" name="txtnome_produto" placeholder="Digite o nome do produto">

                                    <label for="txtdescricao_produto" class="mt-3"> Descrição </label>
                                    <textarea cols="30" rows="2" class="form-control" name="txtdescricao_produto" placeholder="Descrição do produto"> </textarea>

                                    <label for="txtpreco_produto" class="mt-3"> Valor </label>
                                    <input type="text" class="form-control" name="txtpreco_produto" placeholder="Preço do Produto">

                                    <label for="txtfoto_produto" class="mt-3"> Adicionar Imagem </label>
                                    <input type="file" name="txtfoto_produto">

                                    <!-- body modal -->
                                    <div class="modal-footer">
                                        <button class="btn" type="submit" style="border-radius:25px; background-color:rgba(72, 166, 221, 0.781); color:white;"> Cadastrar</button>
                                        <button class="btn" class="close" data-dismiss="modal" aria-label="Close" style="border-radius:25px; background-color:palevioletred; color:white;">voltar</button>

                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- fim modal -->
            </div>

            <!-- LISTA DE PRODUTOS CADASTRADOS-->
            <table class="table table-borderless table-responsive-md table-hover" id="table_lista_produtos">
                <thead>
                    <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F" class="text-center">
                        <th>CÓDIGO</th>
                        <th>NOME</th>
                        <th>DESCRIÇÃO DO PRODUTO</th>
                        <th>PREÇO</th>
                        <th>FOTO</th>
                        <th>DELETAR</th>
                    </tr>

                </thead>
                <!--Estrutura de repetição, que vai executar de acordo com a quantidade de registros armazenados no fetch_array-->
                <?php while ($dado = $listaProdutos->fetch_array()) { ?>
                    <!--Organiza os dados em formato de array-->
                    <tbody>
                        <tr style="border-top: 1px solid #C0C0C0; border-bottom: 1px solid #C0C0C0; color: #4F4F4F" class="text-center">
                            <!--ele localiza pela nome da variavél-->
                            <td> <?php echo $dado['id_produto']; ?> </td>
                            <td> <?php echo $dado['nome_produto']; ?> </td>
                            <td> <?php echo $dado['descricao_produto']; ?> </td>
                            <td> <?php echo $dado['preco_produto']; ?> </td>
                            <td> 
                                <img src="assets/img/produtos/<?php echo $dado['foto_produto']; ?>" width='50px' heigth='50px'>
                            </td>

                            <td class="text-center ">
                                <!--Nesta linha, a variavel id_produto está recendo a variavel $dado['id_produto'], que já contém o Id de cada produto-->
                                <a href="cadastro-produto.php?id_produto=<?php echo $dado['id_produto']; ?>" role="button">
                                    <i class="far fa-trash-alt" style="color:palevioletred ; font-size: 30px;"></i> </a>

                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
            <!--Fim da Tabela-->
        </div>

    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


</body>

</html>