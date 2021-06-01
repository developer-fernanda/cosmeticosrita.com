<?php

include("conexao.php");

//insere dados do produto
function cadastroProduto($conexao){
  $nome_produto = $_POST['txtnome_produto'];
  $descricao_produto = $_POST['txtdescricao_produto'];
  $preco_produto = $_POST['txtpreco_produto'];
  $foto_produto = $_POST['txtfoto_produto'];
  
  $insert_produto = "INSERT INTO produtos VALUES (0, '$nome_produto', '$descricao_produto', '$preco_produto', '$foto_produto')";
  
  $resultado_insert = mysqli_query($conexao, $insert_produto);
  
  if($resultado_insert == true) {
      header('location:cadastro-produto.php?cadastro_sucesso=1');
    } else {
      header('location:cadastro-produto.php?cadastro_sucesso=0');
  }
  
}

//Seleciona dados do produto 

function dadosProduto($conexao){

  $select_produto = "select * from produtos";

  $resultado_select = mysqli_query($conexao, $select_produto);
  
  // $retorna_produto = mysqli_fetch_assoc($resultado_select);
  
  return $resultado_select;

}
