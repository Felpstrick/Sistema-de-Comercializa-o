<?php include("header.php");?>
<?php
    include("conexaoBD.php");
    $idProduto = $_GET["idProduto"];
    $idCliente = $_GET["idCliente"];


    $sqlSelect = "SELECT * FROM produtos WHERE idProduto = '$idProduto'";
    $result = $link->query($sqlSelect);
    while ($registro = mysqli_fetch_assoc($result)) {
        $idAdm = $registro["idAdm"];
    }

    $dataVenda = date("Y-m-d");
    $diaVenda  = substr($dataVenda, 8, 2);
    $mesVenda  = substr($dataVenda, 5, 2);
    $anoVenda  = substr($dataVenda, 0, 4);

    $dataVenda = ("$diaVenda/$mesVenda/$anoVenda");

    $sqlInsert = "INSERT INTO venda (idCliente, idProduto, idAdmin, dataVenda) VALUES ('$idCliente', '$idProduto', '$idAdm', '$dataVenda')";
    $result3 = $link->query($sqlInsert);
    if($result3){
        $sqlUpdate = "UPDATE produtos SET statusProduto ='reservado' WHERE idProduto = '$idProduto'";
        $result2 = $link->query($sqlUpdate);
        echo "<div class='alert alert-success text-center'><strong>Produto</strong> Em processamento, aguardando retorno do administrador</div>";
    }
    else{ 
        echo "<div class='alert alert-danger'>Erro ao tentar marcar <strong>PRODUTO</strong> como vendido!</div>" . mysqli_error($link);

    }
?>
<?php include("footer.php"); ?>