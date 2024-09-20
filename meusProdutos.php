<?php include "header.php" ?>

<?php
    include "conexaoBD.php";
    $idCliente1 = $_GET["idUsuario"];

    //Seleciona informações do cliente
    $sqlSelect = "SELECT * FROM clientes WHERE idCliente = '$idCliente1'";
    $resultSelect = $link->query($sqlSelect);

    if($registro = mysqli_fetch_assoc($resultSelect)){
        $tipoCliente = $registro["tipoCliente"];
    }

    //Seleção de registros tabela venda
    $sqlSelectVenda = "SELECT * FROM venda";
    if($tipoCliente = 'Administrador'){
        $sqlSelectVenda = "SELECT * FROM venda";
        
    }
    else{
        $sqlSelectVenda = "SELECT * FROM venda WHERE idCliente = '$idCliente1'";
    }
    $resultVenda = $link->query($sqlSelectVenda);
    // if($registro = mysqli_fetch_assoc($resultVenda)){
    //     $idAdmin = $registro["idAdmin"];
    //     $idComprador = $registro["idCliente"];
    //     $idProduto = $registro["idProduto"];
    //     $idVenda = $registro["idVenda"];
    // }

    //Seleção de registros tabela produtos
    

    if($tipoCliente = 'Administrador'){
        echo"
        <div class='conteiner-fluid'>
            <div class='p-4'>
                <table class='table'>
                    <tr>
                        <th>Venda</th>
                        <th>Produto</th>
                        <th>Console</th>
                        <th>Preço</th>
                        <th>Comprador</th>
                        <th>Telefone</th>
                        <th>Enviar</th>
                        <th>Recusar</th>
                    </tr>";
                    echo"<tr>";
                    //Cria o loop para selecionar os registros da tabela venda e organiza em forma de tabela
                    while($registro = mysqli_fetch_assoc($resultVenda)){
                        echo"<tr>";
                        echo"<td>".$registro['idVenda']."</td>";
                        
                        $idCliente = $registro['idCliente'];
                        $idProduto = $registro['idProduto'];
                        //Seleciona registros da tabela produtos com base no id registrado na tabela venda
                        $sqlSelectProduto = "SELECT * FROM produtos WHERE idProduto = '$idProduto'";
                        $resultProduto = $link->query($sqlSelectProduto);
                        if($registro = mysqli_fetch_assoc($resultProduto)){
                            $nomeProduto = $registro['nomeProduto'];
                            $listConsole = $registro['listConsole'];
                            $precoProduto = $registro['precoProduto'];
                        }
                        echo"<td>".$nomeProduto."</td>";
                        echo"<td>".$listConsole."</td>";
                        echo"<td>R$ ".$precoProduto."</td>";

                        //Seleciona registros da tabela clientes com base no id registrado na tabela venda
                        $sqlSelect2 = "SELECT * FROM clientes WHERE idCliente = '$idCliente'";
                        $resultSelect2 = $link->query($sqlSelect2);
                        if($registro = mysqli_fetch_assoc($resultSelect2)){
                            $nomeCliente = $registro['nomeCliente'];
                            $telefoneCliente = $registro['telefoneCliente'];
                        }
                        echo"<td>".$nomeCliente."</td>";
                        echo"<td>".$telefoneCliente."</td>";

                        echo"<td><a href=confirmarVenda.php?idProduto=$idProduto> Aceitar </a></td>";
                        echo"<td><a href=#> Recusar </a></td>";
                    }

               echo" </table>
            </div>
        </div>  ";
    }
    




?>

<?php include "footer.php" ?>