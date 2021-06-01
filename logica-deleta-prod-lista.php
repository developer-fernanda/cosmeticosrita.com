<?php

include("conexao.php");

function deleta_produto($conexao){
    //Essa variavél pode capturar valores através da URL - Neste caso, ela irá receber o ID do meu produto
    //Para que isso ocorra, é preciso apontar na outra página o valor que ela irá conter (Linha 117)
    $id_produto = $_GET['id_produto'];

    $delete_produto = "DELETE FROM PRODUTOS WHERE id_produto = $id_produto";

    $resultado_delete = mysqli_query($conexao, $delete_produto);


    if($resultado_delete == true){
            echo '<div class="alert alert-success text-center" role="alert" style="height: 60px; width: 350px;">
                    <i class="fas fa-leaf h5"></i> Produto deletado com sucesso!
                    </div>';    

    }       

}

  

    

