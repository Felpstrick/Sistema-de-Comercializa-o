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
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- CDN para importar os ícones do Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        
        <!-- CDN para valores em Dinheiro -->
        <script src="https://cdn.jsdelivr.net/gh/plentz/jquery-maskmoney@master/dist/jquery.maskMoney.min.js"></script>
        <link rel="stylesheet" href="css/style.css">

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
            
        </style>

    </head>
    <body>

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


        <!-- <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div> -->
    <!-- Top menu -->
        <header class="q">
            <div class="conteiner-fluid">
                <nav class="nav-bar">
                    <div class="logo">
                        <a class="name" href="index.php"><h1>BestGames</h1></a>
                        
                    </div>
                    <div class="nav-list">
                        <ul>
                             
                            <li class="nav-item">
                                <div class="box-search"> 
                                    <input class="form-control" type="search" id="pesquisar" placeholder="Search" aria-label="Search">
                                    <button onclick="searchData()" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                </div>              
                            </li>
                            <?php
                                if($tipoCliente == "administrador"){
                                    echo"
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formAdmin.php'>cadastrar Admin</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formProduto.php?idAdm=$idCliente'>cadastrar Produto</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='listarClientes.php'>Listar Clientes</a>
                                    </li>
                                    
                                    ";
                                }
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="listarProdutos.php?marcaConsole=Playstation">Playstation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listarProdutos.php?marcaConsole=Nintendo">Nintendo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="listarProdutos.php?marcaConsole=Xbox">Xbox</a>
                            </li>
                            
                        </ul>
                    </div>
                    <div class="login-button">
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
                                                    if ($tipoCliente == 'administrador'){ echo"
                                                        <li><a class='dropdown-item' href='meusProdutos.php?pagina=formProduto&idUsuario=$idCliente'>Meus Produtos</a></li>";
                                                        }
                                                    else{
                                                        echo"
                                                            <li><a class='dropdown-item' href='meusPedidos.php?pagina=formProduto&idUsuario=$idCliente'>Meus Pedidos</a></li>";            
                                                    }
                                                    echo
                                                        "<li><a class='dropdown-item' href='logout.php?pagina=formLogin' title='Sair do Sistema'>Logout</a></li>
                                                </ul>
                                        </li>
                                    </ul>";
                                }
                                else{
                                    echo "
                                        <ul class='navbar-nav'>";
                                            if(($pagina == 'formLogin') || ($pagina == 'formUsuario')){
                                                echo"<button><a class='nav-link active' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a></button>";
                                            }
                                            else{
                                                echo"<button><a class='nav-link' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a></button>";
                                                }
                                                    echo "</ul>";
                                    }
                            ?>
                    </div>

                    <div class="smallscreen-icon">
                        <div class="w3-button w3-padding-16 w3-left" onclick="smallscreen()">☰</div>
                    </div>
                    
                    
                </nav>
                <div class="smallscreen-menu">
                        <ul>
                            
                            <li class="nav-item">
                                <div class="box-search"> 
                                    <input class="form-control" type="search" id="pesquisar" placeholder="Search" aria-label="Search">
                                    <button onclick="searchData()" class="btn btn-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                        </svg>
                                    </button>
                                </div>              
                            </li>
                            <?php
                                if($tipoCliente == "administrador"){
                                    echo"
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formAdmin.php'>cadastrar Admin</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='formProduto.php'>cadastrar Produto</a>
                                    </li>
                                    <li class='nav-item'>
                                        <a class='nav-link' href='listarClientes.php'>Listar Clientes</a>
                                    </li>
                                    ";
                                }
                            ?>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="formProduto.php">Playstation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="formProduto.php">Nintendo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="formProduto.php">Xbox</a>
                            </li>
                            
                        </ul>

                        <div class="login-button d-flex">
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
                                                        }
                                                    else{
                                                        echo"
                                                            <li><a class='dropdown-item' href='meusPedidos.php?pagina=formProduto&idUsuario=$idCliente'>Meus Pedidos</a></li>";            
                                                    }
                                                    echo
                                                        "<li><a class='dropdown-item' href='logout.php?pagina=formLogin' title='Sair do Sistema'>Logout</a></li>
                                                </ul>
                                        </li>
                                    </ul>";
                                }
                                else{
                                    echo "
                                        <ul class='navbar-nav'>";
                                            if(($pagina == 'formLogin') || ($pagina == 'formUsuario')){
                                                echo"<button><a class='nav-link active' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a></button>";
                                            }
                                            else{
                                                echo"<button><a class='nav-link' href='formLogin.php?pagina=formLogin' title='Acessar o Sistema'>Login</a></button>";
                                                }
                                                    echo "</ul>";
                                    }
                            ?>
                    </div>
                </div>
            </div>
        </header>
        <?php include("footer.php");?>
        
        
    <!-- !PAGE CONTENT! -->
        <div class="container-mt-5">
            <div class="row">
                <div class="col-12">
                   
                    
                