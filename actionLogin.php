<?php
    session_start(); //Iniciar uma sessão
    include("conexaoBD.php");

    $emailCliente = mysqli_real_escape_string($link, $_POST['emailCliente']);
    $senhaCliente = mysqli_real_escape_string($link, $_POST['senhaCliente']);

    $buscarLogin = "SELECT *
                    FROM clientes
                    WHERE emailCliente = '{$emailCliente}'
                    AND senhaCliente = md5('{$senhaCliente}') ";

    $efetuarLogin = mysqli_query($link, $buscarLogin);

    if($registro = mysqli_fetch_assoc($efetuarLogin)){
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);
        $idCliente       = $registro['idCliente']; 
        $tipoCliente     = $registro['tipoCliente'];
        $fotoCliente     = $registro['fotoCliente'];  
        $emailCliente    = $registro['emailCliente']; 
        $nomeCliente     = $registro['nomeCliente'];

        $_SESSION['idCliente']    = $idCliente;
        $_SESSION['tipoCliente']  = $tipoCliente;
        $_SESSION['fotoCliente']  = $fotoCliente;
        $_SESSION['emailCliente'] = $emailCliente;
        $_SESSION['nomeCliente']  = $nomeCliente;

        $_SESSION['logado']       = true;
        $_SESSION['ultimoAcesso'] = time();

        header('location:index.php?pagina=index'); //Redireciona para a página formUsuario
    }
    elseif(empty($_POST['emailCliente']) || empty($_POST['senhaCliente']) || $quantidadeLogin == 0){
        header('location:formLogin.php?pagina=formLogin&erroLogin=dadosInvalidos');
    }
    
?>