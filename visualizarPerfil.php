<?php include("header.php")?>
<?php

    error_reporting(0);
    session_start();
    $idCliente = $_SESSION["idCliente"];
    
     
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


                echo "<div class='container mt-3'>
                    <div class='container mt-3 text-center'>
                        <img src='$fotoCliente' width='150'>
                    </div>
                        <table class='table'>
                            <tr>
                                <th>NOME</th>
                                <td>$nomeCliente</td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                <td>$emailCliente</td>
                            </tr>
                            <tr>
                                <th>CPF</th>
                                <td>$cpfCliente</td>
                            </tr>
                            <tr>
                                <th>TELEFONE</th>
                                <td>$telefoneCliente</td>
                            </tr>
                        </table>
                ";

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div class="form control d-flex">
            <form action="formAlterarUsuario.php" method="post">
                <div class="p-4">
                    <button type="submit" class="w3-button w3-black w3-padding-large w3-large">Alterar</button>
                </div>
            </form>
            <?php
                echo"
                    <div class='p-4'>
                            <button type='submit' onclick='confirmarOperacao();session_destroy()' class='w3-button w3-black w3-padding-large w3-large'><a style='text-decoration: none; color: white' href='excluirCliente.php?idCliente=$idCliente'>Excluir</a></button>
                    </div>
                    ";
            ?>
        </div>
    </body>
</html>


<?php include("footer.php")?>