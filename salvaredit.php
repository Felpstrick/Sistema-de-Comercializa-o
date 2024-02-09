<?php include("header.php"); ?>


<?php
    include("conexaoBD.php");
    if(isset($_POST["update"])){
        $id          = $_POST["idCliente"];
        $nome        = $_POST["nomeCliente"];
        $cpf    = $_POST["cpfCliente"];
        $telefone    = $_POST["telefoneCliente"];
        $email    = $_POST["emailCliente"];
        //$foto    = $_POST["fotoCliente"];
        $senha    = md5($_POST["senhaCliente"]);
                

        $sqlUpdate = "UPDATE clientes SET nomeCliente='$nome', cpfCliente='$cpf', telefoneCliente='$telefone', emailCliente ='$email', senhaCliente ='$senha' WHERE idCliente='$id'";
        $result = $link->query($sqlUpdate);
    }
    echo"<p>Alterado com sucesso!!</p>";
   

?>

<?php include("footer.php"); ?>