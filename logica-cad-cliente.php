<?php

function cadastraCliente($conexao) {
    $nome = $_POST['txtnome_cliente'];
    $email = $_POST['txtemail_cliente'];
    $senha = $_POST['txtsenha_cliente'];
    
    $insert_cliente = "INSERT INTO cliente VALUES ('0', '$nome', '$email', '$senha')";

    $resultado = mysqli_query($conexao, $insert_cliente);

    if($resultado == true) {
        echo 'Cadastrado com sucesso!';
    } else {
        echo 'Houve algum erro. Tente novamente mais tarde.';
    }
 
}





