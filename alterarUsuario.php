<?php include("header.php") ?>

<?php

    error_reporting(0);
    session_start();
    $idCliente = $_SESSION["idCliente"];
     echo "O código recebido via SESSION foi o número: $idCliente ";
     
     include("conexaoBD.php");

     $sqlSelect = "SELECT * FROM clientes WHERE idCliente= $idCliente";
     $result = $link->query($sqlSelect);


                while($registro = mysqli_fetch_assoc($result)){
                    $idCliente  = $registro["idCliente"];
                    $nomeCliente        = $registro["nomeCliente"];
                    $emailCliente        = $registro["emailCliente"];
                    $cpfCliente    = $registro["cpfCliente"];
                    $telefoneCliente    = $registro["telefoneCliente"];
                    $senhaCliente        = $registro["senhaCliente"];
                    $fotoCliente        = $registro["fotoCliente"];
                }

?>
<html>
    <head>
        <h2>Alterar</h2>

        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />  
    </head>
    <body>
        <form action="salvaredit.php" method="POST" enctype="multipart/form-data">

            <!-- <div class="form">
                <label for="fotoProduto">Foto:</label>
                <input type="file" class="btn btn-link" name="fotoCliente" value="<?php echo $fotoCliente ?>">
            </div> -->


            <div class="form">
                <label for="nomeCliente" class="form-label">*Nome:</label>
                <input type="text" class="form-control" placeholder="Informe o seu nome Completo" name="nomeCliente" value="<?php echo $nomeCliente ?>" required>
                
            </div>

            <div class="form">
                <label for="emailCliente" class="form-label">*Email:</label>
                <input type="text" class="form-control" placeholder="Informe o Email" name="emailCliente" value="<?php echo $emailCliente ?>" required>
                
            </div>

            <div class="form">
                <label for="cpfCliente" class="form-label">*CPF:</label>
                <input type="text" class="form-control" placeholder="Informe seu CPF" name="cpfCliente" id="cpfCliente" value="<?php echo $cpfCliente ?>" required>
                
            </div>

            <div class="form">
                <label for="telefoneCliente" class="form-label">*Telefone:</label>
                <input type="text" class="form-control" placeholder="Informe o seu telefone" name="telefoneCliente" id="telefoneCliente" value="<?php echo $telefoneCliente ?> " required>
                
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
                    <button type="submit" name="update" id="update" class="w3-button w3-black w3-padding-large w3-large">Alterar</button>
                </div>

                <input type="hidden" name="idCliente" value="<?php echo $idCliente ?>">

        </form>   
    </body>
</html>

<?php include("footer.php") ?>