<!DOCTYPE html>
<html>
    <head>
        <title>Best Games</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Latest compiled and minified CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .w3-sidebar a {font-family: "Roboto", sans-serif}
            body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

            <script>
                $(document).ready(function(){
                    $("#cpfCliente").mask("000.000.000-00");
                    $("#telefoneCliente").mask("(00) 00000-0000");
                    $("#precoProduto").mask("000.00"
                );

                    
                });
            </script>
            <?php
                date_default_timezone_set('America/Sao_Paulo');
            ?>
            <style>
            .max-height {
                max-height: 37px; /* Defina a altura máxima desejada */
                width: auto; /* Para manter a proporção original da imagem */
                display: block; /* Para centralizar a imagem horizontalmente na div */
                margin: 0 auto; /* Para centralizar a imagem horizontalmente na div */
            }
        </style>

    </head>
    <body class="w3-main" style="max-width:1600px">

        <!-- Barra Lateral /menu -->
        <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
                        <?php
                            //Habilitar reportagem de erros de execução simples
                            error_reporting(0);
                            session_start();
                            $idCliente    = $_SESSION["idCliente"];
                            $tipoCliente  = $_SESSION["tipoCliente"];
                            $fotoCliente  = $_SESSION["fotoCliente"];
                            $nomeCliente  = $_SESSION["nomeCliente"];

                            $nomeCompleto = explode(' ', $nomeCliente);
                            $primeiroNome = $nomeCompleto[0];

                            $emailCliente = $_SESSION["emailCliente"];
                        ?>


            <a href="javascript:void(0)" onclick="w3_close()"
            class="w3-bar-item w3-button">Close Menu</a>
            <?php
                            //Se o usuário for administrador, exibe o link para cadastrar produto.
                            if($tipoCliente == 'administrador'){
                                echo"
                                    <a href='formProduto.php' onclick='w3_close()' class='w3-bar-item w3-button'>Cadastrar Produto</a>
                                    <a href='formCliente.php' onclick='w3_close()' class='w3-bar-item w3-button'>Cadastrar Cliente</a>
                                ";
                            }
                        ?>
            
            
            <a href="listarClientes.php" onclick="w3_close()" class="w3-bar-item w3-button">Clientes</a>
            <a href="listarProdutos.php" onclick="w3_close()" class="w3-bar-item w3-button">Produtos</a>
            <!-- <a href="formLogin.php" onclick="w3_close()" class="w3-bar-item w3-button">Login</a> -->
            

        </nav>

    <!-- Top menu -->
        <div class="w3-top"">
            <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto; height: 8vh;" >
                <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
                
                    <a href="index.php"><img src='img/Logo3.png' class='' style='width:10%;'></a>
                
                <div class="w3-right" style="margin-top:10px">
                        <?php
                            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){ //Verifica de há sessão iniciada
                                echo "
                                <ul class='navbar-nav'>
                                    <li>
                                        <div class='container'>
                                            <img src='$fotoCliente' class='img-fluid max-height rounded' title='Esta é a sua foto de perfil, $primeiroNome!'>
                                        </div>
                                    </li>
                                    <li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown' style='color: "; if($tipoCliente == "administrador"){ echo "red'";} else{ echo "yellow'";} echo "><strong style='font-size:15px'>$emailCliente</strong></a>
                                        <ul class='dropdown-menu'>
                                            <li><a class='dropdown-item' href='visualizarPerfil.php?pagina=formLogin&idUsuario=$idCliente' title='Visualizar Perfil'>Meu Perfil</a></li>";
                                            if ($tipoUsuario == 'administrador'){ echo"
                                                <li><a class='dropdown-item' href='meusProdutos.php?pagina=formProduto&idUsuario=$idCliente'>Meus Produtos</a></li>";
                                            }else{
                                                echo"
                                                <li><a class='dropdown-item' href='meusPedidos.php?pagina=formProduto&idUsuario=$idCliente'>Meus Pedidos</a></li>";
                                            }
                                            echo
                                            "<li><a class='dropdown-item' href='logout.php?pagina=formLogin' title='Sair do Sistema'>Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>";
                            }else{
                                echo "
                                <ul class='navbar-nav'>";
                                    if(($pagina == 'formLogin') || ($pagina == 'formUsuario')){
                                        echo"<a class='nav-link active' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a>";
                                    }
                                    else{
                                        echo"<a class='nav-link' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a>";
                                    }
                                echo "</ul>";
                            }
                        ?>
                    
                </div>
            </div>
            
        </div>
    
    <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-top:120px; margin-left:300px;">
            <div class="row">
                <div class="col-12">
                   
                    
            