<?php include("header.php"); ?>

<div class="d-flex justify-content-center mb-3">
    <div class="row">
        <div class="col-12">
            <div class="p-4">
                <h2>Cadastrar Administrador</h2>
            </div>


            <form class="" action="cadastrarAdmin.php" method="POST" enctype="multipart/form-data">

                <div class="p-4">
                    <label for="fotoProduto">Foto:</label>
                    <input type="file" class="form-control" name="fotoCliente">
                </div>


                <div class="p-4">
                    <label for="nomeCliente" class="form-label">*Nome:</label>
                    <input type="text" class="form-control" placeholder="Informe o seu nome Completo" name="nomeCliente" required>

                </div>

                <div class="p-4">
                    <label for="emailCliente" class="form-label">*Email:</label>
                    <input type="text" class="form-control" placeholder="Informe o Email" name="emailCliente" required>

                </div>

                <div class="p-4">
                    <label for="cpfCliente" class="form-label">*CPF:</label>
                    <input type="text" class="form-control" placeholder="Informe seu CPF" name="cpfCliente" id="cpfCliente" required>

                </div>

                <div class="p-4">
                    <label for="telefoneCliente" class="form-label">*Telefone:</label>
                    <input type="text" class="form-control" placeholder="Informe o seu telefone" name="telefoneCliente" id="telefoneCliente" required>

                </div>

                <div class="row p-4">
                    <div class="form-group col-5">
                        <label for="senhaCliente" class="form-label">*Senha:</label>
                        <input type="password" class="form-control" placeholder="Informe a Senha" name="senhaCliente" required>
                    </div>
                    <div class="form-group col-5">
                        <label for="confirmarSenhaCliente" class="form-label">*Confirme a Senha:</label>
                        <input type="password" class="form-control" placeholder="Confirme a Senha" name="confirmarSenhaCliente" required>
                    </div>

                </div>


                <div class="p-4">
                    <button type="submit" class="w3-button w3-black w3-padding-large w3-large">Cadastrar</button>
                </div>



            </form>
        </div>
    </div>
</div>




<?php include("footer.php"); ?>