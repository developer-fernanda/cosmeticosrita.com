<?php
include('conexao.php');
include('logica-login-cliente.php');

//Recupera o Id do cliente logado 
$email_cliente = pegaEmailDoClienteLogado();

$select_cliente = "SELECT * FROM cliente WHERE email_cliente = '$email_cliente'";

$resultado_cliente = @mysqli_query($conexao, $select_cliente);
    
$retorna_cliente= @mysqli_fetch_assoc($resultado_cliente);

var_dump($retorna_cliente);

//Recupera os itens do carrinho 
//Ele resgata os dados do retorna_cliente e seleciona somente o que vou usar através do [].
$id_cliente = $retorna_cliente['id_cliente'];

$select_prodCarrinho = "SELECT * FROM carrinho INNER JOIN produtos ON produtos.id_produto = carrinho.id_produto INNER JOIN cliente ON cliente.id_cliente = carrinho.id_cliente WHERE cliente.id_cliente = '$id_cliente'";

$resultado_carrinho = @mysqli_query($conexao, $select_prodCarrinho);

//Recupera total da compra
$select_totalCarrinho = "SELECT SUM(preco_produto * 1) AS total_venda FROM carrinho INNER JOIN produtos ON produtos.id_produto = carrinho.id_produto INNER JOIN cliente ON cliente.id_cliente = carrinho.id_cliente WHERE cliente.id_cliente =  '$id_cliente' ";
$resultado_total = @mysqli_query($conexao, $select_totalCarrinho);

$total_carrinho = @mysqli_fetch_assoc($resultado_total);

// Recupera data de venda

//Essa variavél irá selecionar apenas o total da venda que está no array acima
$total_venda = $total_carrinho['total_venda'];

//insert na tabela de vendas

$insert_venda = "INSERT INTO venda VALUES (0, '$id_cliente', now(), '$total_venda' )";

$resultado = @mysqli_query($conexao, $insert_venda);

if($resultado == true){
    $ultimo_id = @mysqli_insert_id($conexao);
    while($recebe_carrinho = $resultado_carrinho->fetch_array()){
        $quantidade = 1;
        $id_produto = $recebe_carrinho['id_produto'];
        $total = $recebe_carrinho['preco_produto'] * $quantidade;
        $insert_item_venda = "INSERT INTO item_venda VALUES (0, '$id_produto', '$ultimo_id', $quantidade, $total)";
        $resultado_item_venda = @mysqli_query($conexao, $insert_item_venda);
    }

        $deleta_item_carrinho = "DELETE FROM carrinho WHERE id_cliente = $id_cliente";
        $resultado_carrinho = @mysqli_query($conexao, $deleta_item_carrinho);
        header('location:cadastro-venda-fim.php');
    
}else{
    echo 'Erro!';
}























//fechando a conexao
mysqli_close($conexao);
