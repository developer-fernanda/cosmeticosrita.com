<?php 
session_start();

//Ao chamar a função é necessário estabelecer a conexão com o banco 
function logaUsuario($conexao){
    
    // Recuperar dados de login do formulário via POST e realizar uma consulta na tabela de cliente para efetuar/barrar o usuário de entrar no sistema 

    $nome_usuario = $_POST['txtnome_usuario'];
    $senha_usuario =  $_POST['txtsenha_usuario'];
    
    $select_usuario = "select * from usuario where nome_usuario = '$nome_usuario' and senha_usuario = '$senha_usuario'";
            
    $resultado = mysqli_query($conexao, $select_usuario);
    
    $retorna_usuario = mysqli_fetch_assoc($resultado);

    // var_dump($retorna_cliente);

    if($retorna_usuario == null){
        echo " <label class='alert alert-danger'>    
                Dados incorretos, tente novamente!
                </label>";
    }else{
        // Criando sessão de usuario
        $_SESSION["usuario_logado"] = $nome_usuario;
        header('location:cadastro-produto.php');
    }              
}

//Após o login estas funções realizam a verificação para que somente o usúario logado tenha acesso ao restante do sistema
function verificaSeUsuarioEstaLogado(){
    if(!isset($_SESSION["usuario_logado"]) ){
        // Usúario nao esta logado!";
        header("Location:erro-usuario.php");
        //Encerra a exexução do código
        die();
    }
}

function pegaNomeDoUsuarioLogado(){
    return $_SESSION["usuario_logado"];
}
  

function logout(){
    session_destroy();
    header("Location: login-usuario.php");
}


?>