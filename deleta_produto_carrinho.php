<?php

include ('conexao.php');
include ('logica-login-cliente.php');


//Recupera os dados do cliente logado
$email = pegaEmailDoClienteLogado();

$select_cliente = "SELECT * FROM cliente WHERE email_cliente = '$email'";

$lista_cliente = mysqli_query($conexao, $select_cliente);

$dados_cliente = mysqli_fetch_array($lista_cliente);

$id_cliente = $dados_cliente['id_cliente'];

//Deleta dados do cliente

$id_carrinho = $_GET['id_carrinho'];

$delete_carrinho = "delete from carrinho where id_carrinho = '$id_carrinho' and id_cliente = '$id_cliente'";

$resultado = mysqli_query($conexao, $delete_carrinho);

header('location:consultar_carrinho.php');