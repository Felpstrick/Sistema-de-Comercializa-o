<?php include("header.php"); ?>



    <h2 style="margin-top:15px">Cadastrar Cliente</h2>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

    <form action="cadastrarCliente.php" method="POST" enctype="multipart/form-data">

        <div class="form">
            <label for="fotoProduto">Foto:</label>
            <input type="file" class="btn btn-link" name="fotoCliente">
        </div>
       
    
        <div class="form">
            <label for="nomeCliente" class="form-label">*Nome:</label>
            <input type="text" class="form-control" placeholder="Informe o seu nome Completo" name="nomeCliente" required>
            
        </div>

        <div class="form">
            <label for="emailCliente" class="form-label">*Email:</label>
            <input type="text" class="form-control" placeholder="Informe o Email" name="emailCliente" required>
            
        </div>

        <div class="form">
            <label for="cpfCliente" class="form-label">*CPF:</label>
            <input type="text" class="form-control" placeholder="Informe seu CPF" name="cpfCliente" id="cpfCliente" required>
            
        </div>

        <div class="form">
            <label for="telefoneCliente" class="form-label">*Telefone:</label>
            <input type="text" class="form-control" placeholder="Informe o seu telefone" name="telefoneCliente" id="telefoneCliente" required>
            
        </div>

        <div class="form">
            <label for="senhaCliente" class="form-label">*Senha:</label>
            <input type="password" class="form-control" placeholder="Informe a Senha" name="senhaCliente" required>
            
        </div>

        <div class="form">
            <label for="confirmarSenhaCliente" class="form-label">*Confirme a Senha:</label>
            <input type="password" class="form-control" placeholder="Confirme a Senha" name="confirmarSenhaCliente" required>
            
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
                <button type="submit" class="w3-button w3-black w3-padding-large w3-large">Cadastrar</button>
            </div>

        

    </form>




    <?php include("footer.php"); ?>