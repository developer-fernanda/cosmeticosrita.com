<?php
include('conexao.php');

$nome=$_POST['txtcliente'];
$obs=$_POST['txtobs'];

function cadastraVenda($conexao, $id_cliente) {
    // criar string de insert
    $sqlinsert="insert  into vendas values (0, '$id_cliente', now(), '')";

    // criar variavel criando query
    $resultado=@mysqli_query($conexao, $sqlinsert);

    // verificação de erro sql
    if (!$resultado) {
        die('Query Inválida: ' . @mysqli_error($conexao));  
    } else {
        header('Location:venda_prod.php');
        
    } 

    //fechando a conexao
    mysqli_close($conexao);
}


