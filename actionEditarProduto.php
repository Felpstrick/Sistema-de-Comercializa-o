<?php include("header.php") ?>

<?php
    //Variáveis
    $nomeProduto = $precoProduto = $descricaoProduto = $marcaConsole = $listConsole = $dataProduto = "";
    $tudoCerto = True;
    
    //Validação
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["nomeProduto"])){
            echo "<div class='alert alert-warning'>O campo<strong>NOME</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $nomeProduto = testar_entrada($_POST["nomeProduto"]);}
        
        if(empty($_POST["precoProduto"])){
            echo "<div class='alert alert-warning'>O campo <strong>PREÇO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            $precoProduto = testar_entrada($_POST["precoProduto"]);
        }
        
        if(empty($_POST["descricaoProduto"])){
            echo "<div class='alert alert-warning'>O campo <strong>DESCRIÇÃO</strong> é obrigatório!</div>";
            $tudoCerto = false;
        }
        else{
            //Aplica a função md5 para criptografar a senha (e também a confirmação de senha)
            $descricaoProduto = testar_entrada($_POST["descricaoProduto"]);
        }

        $marcaConsole = testar_entrada($_POST["marcaConsole"]);

        $listConsole = testar_entrada($_POST["listConsole"]);

        $idProduto = $_POST['idProduto'];

        $dataProduto = date("Y-m-d");
        $diaProduto  = substr($dataProduto, 8, 2);
        $mesProduto  = substr($dataProduto, 5, 2);
        $anoProduto  = substr($dataProduto, 0, 4);



        $diretorio    = "img/produtos/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotoProduto  = $diretorio . basename($_FILES["fotoProduto"]["name"]); //img/docente.png
        $uploadOK     = true; //Variável criada para verificar se houve sucesso no upload do arquivo
        $tipoDaImagem = strtolower(pathinfo($fotoProduto, PATHINFO_EXTENSION)); //Pegar o tipo do arquivo
        $uploadOK = true;

        if($_FILES["fotoProduto"]["size"] > 5000000) { //Verifica o tamanho em BYTES
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
            if(!move_uploaded_file($_FILES["fotoProduto"]["tmp_name"], $fotoProduto)){
                echo "<div class='alert alert-warning'>Erro ao tentar mover 
                    <strong>A FOTO</strong> para o diretório $diretorio!</div>";
                $uploadOK = false;
            }
        }

        if($tudoCerto && $uploadOK){

            $alterarProduto = "UPDATE produtos SET nomeProduto='$nomeProduto', precoProduto='$precoProduto', descricaoProduto='$descricaoProduto', marcaConsole='$marcaConsole', listConsole='$listConsole', dataProduto='$dataProduto', fotoProduto='$fotoProduto' where idProduto='$idProduto' ";

            include("conexaoBD.php");

            if(mysqli_query($link, $alterarProduto)){
    
                echo "<div class='alert alert-success text-center'><strong>Produto</strong> cadastrado(a) com sucesso!</div>";
        
                echo "<div class='container mt-3'>
                        <div class='container mt-3 text-center'>
                            <img src='$fotoProduto' width='150'>
                        </div>
                        <table class='table'>
                            <tr>
                                <th>Nome</th>
                                <td>$nomeProduto</td>
                            </tr>
                            <tr>
                                <th>Plataforma</th>
                                <td>$listConsole</td>
                            </tr>
                            <tr>
                                <th>Preço</th>
                                <td>$precoProduto</td>
                            </tr>
                            <tr>
                                <th>Plataforma</th>
                                <td>$marcaConsole</td>
                            </tr>
                            <tr>
                                <th>Console</th>
                                <td>$listConsole</td>
                            </tr>
                            <tr>
                                <th>Descrição</th>
                                <td>$descricaoProduto</td>
                            </tr>
                            <tr>
                                <th>DATA: </th>
                                <td>$dataProduto</td>
                            </tr>
                        </table>
                    </div>
                ";
            }
            else{
                echo "<div class='alert alert-danger'>Erro ao tentar cadastrar <strong>PRODUTO</strong>!</div>" . mysqli_error($link);
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

<?php include("footer.php") ?>