<?php include("header.php"); ?>
<?php $idCliente = $_GET['idAdm']; ?>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <div class="p-4">
                    <h2>Cadastrar Produto</h2>
                </div>
                <form action="cadastrarProduto.php" method="POST" enctype="multipart/form-data">

                    <div class="p-4">
                        <label for="fotoProduto">Foto:</label>
                        <input type="file" class="form-control" name="fotoProduto">
                    </div>

                    <div class="p-4">
                        <label for="nomeProduto">Nome do Produto:</label>
                        <input type="text" class="form-control" placeholder="Nome do Produto" name="nomeProduto" required>
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
                        <input type="text" class="form-control" placeholder="Preço do Produto: R$" name="precoProduto" id="precoProduto" required>
                    </div>

                    <div class="p-4">
                        <label for="descricaoProduto">Descrição do Produto:</label>   
                        <input type="text" class="form-control" placeholder="Informe uma descrição do Produto" name="descricaoProduto" required>
                    </div>
                    <input type="hidden" name="idAdm" value="<?php echo $idCliente ?>">
                    <div class="p-4">
                            <button type="submit" class="w3-button w3-black w3-padding-large w3-large">Cadastrar</button>
                    </div>


                </form>
            </div>
        </div>
    </div>


    <?php include("footer.php"); ?>