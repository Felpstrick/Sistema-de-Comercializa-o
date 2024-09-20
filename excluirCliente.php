<?php include("header.php");?>
<?php
    include("conexaoBD.php");
    $idCliente = $_GET['idCliente'];
    
    
    $sqlDelete = "DELETE FROM Clientes where idCliente ='$idCliente'";

    if(mysqli_query($link, $sqlDelete)){
        echo "<div class='alert alert-success text-center'><strong>USUÁRIO</strong> excluído com sucesso!</div>";
        session_destroy();
    }
    else{ 
        echo "<div class='alert alert-danger'>Erro ao tentar excluir <strong>USUÁRIO</strong> do sistema!</div>" . mysqli_error($link);

    }
?>
<?php include("footer.php");?>