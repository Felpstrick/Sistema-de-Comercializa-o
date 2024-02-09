<?php include("header.php"); ?>

    <h2 style="margin-top:15px">Cadastrar Produto</h2>
    
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <form action="cadastrarProduto.php" method="POST" enctype="multipart/form-data">

        <div class="form">
            <label for="fotoProduto">Foto:</label>
            <input type="file" class="btn btn-link" name="fotoProduto">
        </div>

        <div class="form">
            <label for="nomeProduto">Nome do Produto:</label>
            <input type="text" class="form-control" placeholder="Nome do Produto" name="nomeProduto" required>
        </div>
        <div class="form">
            <label for="listConsole">Plataforma:</label>
            <select class="form-control" id="listConsole" name="listConsole">
                <option value="PS3">Playstation 3</option>
                <option value="PS4">Playstation 4</option>
                <option value="PS5">Playstation 5</option>
                <option value="XONE">Xbox One</option>
                <option value="XBOX SERIES">Xbox Series S/X</option>
                <option value="NST">Nintendo Switch</option>


        
            </select>
        </div>

        <div class="form">
            <label for="precoProduto">Preço do Produto:</label>
            <input type="text" class="form-control" placeholder="Preço do Produto: R$" name="precoProduto" id="precoProduto" required>
        </div>

        <div class="form">
            <label for="descricaoProduto">Descrição do Produto:</label>   
            <input type="text" class="form-control" placeholder="Informe uma descrição do Produto" name="descricaoProduto" required>
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
                <button type="submit" class="w3-button w3-black w3-padding-large w3-large">Cadastrar</button>
            </div>

    </form>


    <?php include("footer.php"); ?>