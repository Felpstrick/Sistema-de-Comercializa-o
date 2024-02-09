<?php
    session_start(); //Inicia uma sessão
    if(!isset($_SESSION['logado']) || $_SESSION['logado'] === false){ //Verifica de há sessão iniciada
        header('location:formLogin.php?pagina=formLogin&erroLogin=naoLogado');
    }else{
        $tipoUsuario = $_SESSION['tipoUsuario'];
        if(($_SESSION['tipoUsuario'] != "administrador") && ($_SESSION['tipoUsuario'] != "consumidor")){
            header('location:formLogin.php?pagina=formLogin&erroLogin=acessoProibido');
        }
    }

    if (isset($_SESSION['ultimoAcesso']) && (time() - $_SESSION['ultimoAcesso'] > 300)) {
        session_unset(); // Remove todas as variáveis de sessão
        session_destroy(); // Destrói a sessão
        header("Location: formlogin.php?pagina=formLogin&erroLogin=timeOut"); // Redireciona para a página de login
        exit;
    }

    // Atualize o tempo de último acesso
    $_SESSION['ultimoAcesso'] = time();
?>