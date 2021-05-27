<?php 
session_start();

//Ao chamar a função é necessário estabelecer a conexão com o banco 
function logaCliente($conexao){
    
    // Recuperar dados de login do formulário via POST e realizar uma consulta na tabela de cliente para efetuar/barrar o usuário de entrar no sistema 

    $email_cliente = $_POST['txtemail_cliente'];
    $senha_cliente =  $_POST['txtsenha_cliente'];
    
    $select_cliente = "select * from cliente where email_cliente = '$email_cliente' and senha_cliente = '$senha_cliente'";
    
        
    $resultado = mysqli_query($conexao, $select_cliente);
    
    $retorna_cliente= mysqli_fetch_assoc($resultado);

    // var_dump($retorna_cliente);
    // die();

    if($retorna_cliente == null){
        echo " <label class='alert alert-danger'>    
                Dados incorretos, tente novamente!
                </label>";
    }else{
        // Criando sessão de cliente
        $_SESSION["cliente_logado"] = $email_cliente;
        header('location:lista-produto.php');
    }              
}

//Após o login estas funções realizam a verificação para que somente o usúario logado tenha acesso ao restante do sistema
function verificaSeClienteEstaLogado(){
    if(!isset($_SESSION["cliente_logado"]) ){
        // Usúario nao esta logado!";
        header("Location:erro-cliente.php");
        //Encerra a exexução do código
        die();
    }
}

function pegaEmailDoClienteLogado(){
    return $_SESSION["cliente_logado"];
}
  

function logout(){
    session_destroy();
    header("Location: login-cliente.php");
}

?>