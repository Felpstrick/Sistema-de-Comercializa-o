<?php include("header.php") ?>

<?php
    
    //Variáveis
    $nomeCliente = $emailCliente = $senhaCliente = $confirmarSenhaCliente = $cpfCliente = $telefoneCliente = "";
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

        if(empty($_POST["cpfCliente"])){
            echo "<div class='alert alert-warning'>O campo <strong>CPF</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $cpfCliente = testar_entrada($_POST["cpfCliente"]);
        }

        if(empty($_POST["telefoneCliente"])){
            echo "<div class='alert alert-warning'>O campo <strong>TELEFONE</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $telefoneCliente = testar_entrada($_POST["telefoneCliente"]);
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


        $diretorio    = "img/Clientes/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoCliente  = $diretorio . basename($_FILES["fotoCliente"]["name"]); //img/docente.png
        $uploadOK     = true; //Variável criada para verificar se houve sucesso no upload do arquivo
        $tipoDaImagem = strtolower(pathinfo($fotoCliente, PATHINFO_EXTENSION)); //Pegar o tipo do arquivo
        $uploadOK = true;

        if($_FILES["fotoCliente"]["size"] > 5000000) { //Verifica o tamanho em BYTES
            echo "<div class='alert alert-warning'>Atenção! A foto ultrapassa o <strong>TAMANHO MÁXIMO</strong> permitido (5MB)!</div>";
            $uploadOK = false;
        }


        //Verificar o tipo do arquivo (Pela extensão)
        if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png"){
            echo "<div class='alert alert-warning'>Atenção! A foto precisa estar nos formatos <strong>JPG, JPEG ou PNG</strong>!</div>";
            $uploadOK = false;
        }

        if(!$uploadOK){
            echo "<div class='alert alert-warning'>Erro ao tentar fazer o <strong>UPLOAD DA FOTO</strong>!</div>";
            $uploadOK = false;
        }
        else{
            //A função seguinte é responsável por mover o arquivo para o diretório definido
            if(!move_uploaded_file($_FILES["fotoCliente"]["tmp_name"], $fotoCliente)){
                echo "<div class='alert alert-warning'>Erro ao tentar mover 
                    <strong>A FOTO</strong> para o diretório $diretorio!</div>";
                $uploadOK = false;
            }
        }

        if($tudoCerto){

            $inserirCliente = "INSERT INTO clientes (tipoCliente, nomeCliente, emailCliente, cpfCliente, telefoneCliente, senhaCliente, fotoCliente)
                            VALUES ('administrador', '$nomeCliente', '$emailCliente', '$cpfCliente', '$telefoneCliente',  '$senhaCliente', '$fotoCliente')";
    
                include("conexaoBD.php");
    
            if(mysqli_query($link, $inserirCliente)){
                echo "<div class='alert alert-success text-center'><strong>Cliente</strong> cadastrado(a) com sucesso!</div>";
    
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