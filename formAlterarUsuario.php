<?php include("header.php") ?>

<?php

error_reporting(0);
session_start();
$idCliente = $_SESSION["idCliente"];

include("conexaoBD.php");

$sqlSelect = "SELECT * FROM clientes WHERE idCliente= $idCliente";
$result = $link->query($sqlSelect);


while ($registro = mysqli_fetch_assoc($result)) {
    $idCliente  = $registro["idCliente"];
    $nomeCliente        = $registro["nomeCliente"];
    $emailCliente        = $registro["emailCliente"];
    $cpfCliente    = $registro["cpfCliente"];
    $telefoneCliente    = $registro["telefoneCliente"];
    $senhaCliente        = $registro["senhaCliente"];
    $fotoCliente        = $registro["fotoCliente"];
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    </head>

    <body>
        <div class="d-flex justify-content-center mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="p-4">
                        <h2>Alterar</h2>
                    </div>
                    <form action="actions/actionAlterarUsuario.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                            <img src="<?php echo $fotoCliente; ?>" width="100"> <!-- Exibe a FOTO ATUAL cadastrada -->
                            <input type="hidden" name="fotoAtual" value="<?php echo $fotoCliente; ?>"> <!-- Passa o local da FOTO ATUAL como parâmetro oculto com um NAME diferente-->
                            <input type="file" class="btn form-control" name="fotoCliente"> <!-- Oferece a opção para alterar foto-->
                        </div>


                        <div class="p-4">
                            <label for="nomeCliente" class="form-label">*Nome:</label>
                            <input type="text" class="form-control" placeholder="Informe o seu nome Completo" name="nomeCliente" value="<?php echo $nomeCliente ?>" required>

                        </div>

                        <div class="p-4">
                            <label for="emailCliente" class="form-label">*Email:</label>
                            <input type="text" class="form-control" placeholder="Informe o Email" name="emailCliente" value="<?php echo $emailCliente ?>" required>

                        </div>

                        <div class="p-4">
                            <label for="cpfCliente" class="form-label">*CPF:</label>
                            <input type="text" class="form-control" placeholder="Informe seu CPF" name="cpfCliente" id="cpfCliente" value="<?php echo $cpfCliente ?>" required>

                        </div>

                        <div class="p-4">
                            <label for="telefoneCliente" class="form-label">*Telefone:</label>
                            <input type="text" class="form-control" placeholder="Informe o seu telefone" name="telefoneCliente" id="telefoneCliente" value="<?php echo $telefoneCliente ?> " required>

                        </div>

                        <div class="p-4">
                            <label for="senhaCliente" class="form-label">*Senha:</label>
                            <input type="password" class="form-control" placeholder="Informe a Senha" name="senhaCliente" required>

                        </div>

                        <div class="p-4">
                            <label for="confirmarSenhaCliente" class="form-label">*Confirme a Senha:</label>
                            <input type="password" class="form-control" placeholder="Confirme a Senha" name="confirmarSenhaCliente" required>

                        </div>
                        <div class="p-4">
                            <button type="submit" name="update" id="update" class="w3-button w3-black w3-padding-large w3-large">Alterar</button>
                        </div>

                        <input type="hidden" name="idCliente" value="<?php echo $idCliente ?>">

                    </form>
                </div>
            </div>
        </div>
    </body>

</html>

<?php include("C:xampp/htdocs/BestGames/outros/footer.php") ?>