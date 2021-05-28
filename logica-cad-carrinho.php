<?php 

include('conexao.php');

$id_produto = $_GET['id_produto'];
$id_cliente = $_GET['id_cliente'];

$insert_carrinho = "insert into carrinho values (0, '$id_produto', '$id_cliente')";

$resultado = mysqli_query($conexao, $insert_carrinho);

if($resultado == true){
    header('location:lista-produto.php');
}else{
    echo 'Você ainda não possui nenhum item cadastrado';
}