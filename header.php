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
        <style>
            .w3-sidebar a {font-family: "Roboto", sans-serif}
            body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
        </style>
    </head>
    <body class="w3-content" style="max-width:1200px">

        <!-- Barra Lateral /menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
                <img src="img/Logo.png" style="width:100%">
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
                    Funções <i class="fa fa-caret-down"></i>
                </a>
                    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                        <a href="formCliente.php" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>Cadastrar Cliente (Visitante)</a>
                        <a href="formProduto.php" class="w3-bar-item w3-button">Cadastrar Produto (Admin)</a>
                        <a href="listarProdutos.php" class="w3-bar-item w3-button">Listar Produtos (Todos)</a>
                        <a href="formLogin.php" class="w3-bar-item w3-button">Login (Todos)</a>
                    </div>
            </div>
            <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
            <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
        </nav>

        <!-- Top menu em telas pequenas -->
        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
            <div class="w3-bar-item w3-padding-24 w3-wide">LOGO</div>
            <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
        </header>

        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- CONTEÚDO DA PÁGINA! -->
        <div class="w3-main" style="margin-left:250px">

            <!-- Push down content on small screens -->
            <div class="w3-hide-large" style="margin-top:83px"></div>
    
            <!-- Top header -->
            <header class="w3-container w3-xlarge">
                <p class="w3-left">Best Games</p>
                <p class="w3-right">
                    <i class="fa fa-shopping-cart w3-margin-right"></i>
                    <i class="fa fa-search"></i>
                </p>
            </header>

            <!-- Image header -->
            