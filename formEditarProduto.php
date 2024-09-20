<?php include("header.php") ?>

<?php
    $idProduto = $_GET["idProduto"];
     
     include("conexaoBD.php");

     $sqlSelect = "SELECT * FROM produtos WHERE idProduto= $idProduto";
     $result = $link->query($sqlSelect);


                while($registro = mysqli_fetch_assoc($result)){
                    $idCliente  = $registro["idProduto"];
                    $nomeProduto        = $registro["nomeProduto"];
                    $listConsole        = $registro["listConsole"];
                    $precoProduto    = $registro["precoProduto"];
                    $descricaoProduto    = $registro["descricaoProduto"];
                    $statusProduto        = $registro["statusProduto"];
                    $dataProduto        = $registro["dataProduto"];
                    $fotoProduto        = $registro["fotoProduto"];

                }

?>
<html>
    <head>
        

        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />  
    </head>
    <body>
        <div class="d-flex justify-content-center mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="p-4">
                        <h2>Alterar</h2>
                    </div>
                    <form action="actionEditarProduto.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <img src="<?php echo $fotoProduto; ?>" width="100"> <!-- Exibe a FOTO ATUAL cadastrada -->
                            <input type="hidden" name="fotoAtual" value="<?php echo $fotoProduto; ?>"> <!-- Passa o local da FOTO ATUAL como parâmetro oculto com um NAME diferente-->
                            <input type="file" class="btn btn-link" name="fotoProduto"> <!-- Oferece a opção para alterar foto-->
                        </div>

                        <div class="p-4">
                            <label for="nomeProduto">Nome do Produto:</label>
                            <input type="text" class="form-control" placeholder="Nome do Produto" value="<?php echo $nomeProduto ?>" name="nomeProduto" required>
                        </div>
                        <div class="p-4">
                            <label for="listConsole">Plataforma:</label>
                            <select class='form-control' id='marcaConsole' name='marcaConsole'>
                                <option value='NINTENDO'>Nintendo</option>
                                <option value='XBOX'>Xbox</option>
                                <option value='PLAYSTATION'>Playstation</option>
                            </select>
                        </div>
                        <div class="p-4">
                            <label for="listConsole">Plataforma:</label>
                            <select class='form-control' id='listConsole' name='listConsole'>
                                <option value='PSONE'>Playstation One</option>
                                <option value='PS2'>Playstation 2</option>
                                <option value='PS3'>Playstation 3</option>
                                <option value='PS4'>Playstation 4</option>
                                <option value='PS5'>Playstation 5</option>
                                <option value='PSP'>Playstation Portable</option>
                                <option value='PSVITA'>Playstation Vita</option>
                                <option value='XBOX'>Xbox</option>
                                <option value='XBOX360'>Xbox 360</option>
                                <option value='XBOXONE'>Xbox One</option>
                                <option value='XBOXSERIES'>Xbox Series X</option>
                                <option value='NES'>Nintendo</option>
                                <option value='SNES'>Super Nintendo</option>
                                <option value='N64'>Nintendo 64</option>
                                <option value='NGC'>Nintendo GameCube</option>
                                <option value='WII'>Nintendo WII</option>
                                <option value='DS'>Nintendo DS</option>
                                <option value='3DS'>Nintendo 3DS</option>
                                <option value='SWITCH'>Nintendo Switch</option>
                            </select>
                        </div>

                        <div class="p-4">
                            <label for="precoProduto">Preço do Produto:</label>
                            <input type="text" value="<?php echo $precoProduto ?>" class="form-control" placeholder="Preço do Produto: R$" name="precoProduto" id="precoProduto" required>
                        </div>

                        <div class="p-4">
                            <label for="descricaoProduto">Descrição do Produto:</label>   
                            <input type="text" class="form-control" value="<?php echo $descricaoProduto ?>" placeholder="Informe uma descrição do Produto" name="descricaoProduto" required>
                        </div>
                        <div class="p-4">
                                <button type="submit" name="update" id="update" class="w3-button w3-black w3-padding-large w3-large">Alterar</button>
                            </div>
                            <input type="hidden" name="idProduto" value="<?php echo $idProduto ?>">

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>

<?php include("footer.php") ?>