<?php include("header.php") ?>

<?php
    
    //Variáveis
    $nomeCliente = $emailCliente = $senhaCliente = $confirmarSenhaCliente = "";
    $tudoCerto = True;

    //Validação
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nomeCliente"])){
            echo "<div class='alert alert-warning'>O campo<strong>NOME</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $nomeCliente = testar_entrada($_POST["nomeCliente"]);}
        
        if(empty($_POST["emailCliente"])){
            echo "<div class='alert alert-warning'>O campo <strong>EMAIL</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $emailCliente = testar_entrada($_POST["emailCliente"]);
        }
        
        if(empty($_POST["senhaCliente"])){
            echo "<div class='alert alert-warning'>O campo <strong>SENHA</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            //Aplica a função md5 para criptografar a senha (e também a confirmação de senha)
            $senhaCliente = md5(testar_entrada($_POST["senhaCliente"]));
        }

        if(empty($_POST["confirmarSenhaCliente"])){
            echo "<div class='alert alert-warning'>O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $confirmarSenhaCliente = md5(testar_entrada($_POST["confirmarSenhaCliente"]));
            if($senhaCliente != $confirmarSenhaCliente){
                echo "<div class='alert alert-warning'>Atenção! <strong>SENHAS DIFERENTES</strong>!</div>";
                $tudoCerto = false;
            }
        }

        if($tudoCerto ){

            $inserirCliente = "INSERT INTO clientes (nomeCliente, emailCliente, senhaCliente)
                            VALUES ('$nomeCliente', '$emailCliente', '$senhaCliente')";
    
                include("conexaoBD.php");
    
            if(mysqli_query($link, $inserirCliente)){
                echo "<div class='alert alert-success text-center'><strong>Cliente</strong> cadastrado(a) com sucesso!</div>";
    
                echo "<div class='container mt-3'>
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
                                <th>SENHA</th>
                                <td>$senhaCliente</td>
                            </tr>
                        </table>
                ";
            }
            else{
                echo "<div class='alert alert-danger'>Erro ao tentar cadastrar <strong>CLIENTE</strong>!</div>" . mysqli_error($link);
            }
        }

    }


    



    function testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove caracteres desnecessários (TABS, espaços, etc)
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais em entidades HTML
        return($dado);
    }
?>



<?php include("footer.php"); ?>
