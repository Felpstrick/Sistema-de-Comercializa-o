
<?php include("header.php"); ?>

<div class="container-fluid"></div>
<?php
    //Inclui o arquivo de conexão com o Banco de Dados
    include("conexaoBD.php");
    $listarProdutos = "SELECT * FROM Produtos order by statusProduto";

    // if(!empty($_GET('search'))){
    //     echo"Há";
    //     $search = $_GET['search'];
    //     echo"$search";
    //     // 
    // }
    // else{
    //     echo"Não há";
        
    //     
    //      //Seleciona todos os campos da tabela Produtos
    // }
        if(isset($_GET['search'])){
            echo"$search";
            $search = $_GET['search'];
            $listarProdutos = "SELECT * FROM Produtos WHERE nomeProduto LIKE '%$search%' OR listConsole LIKE '%$search%' OR marcaConsole LIKE '%$search%' order by statusProduto";
        }
    

    if(isset($_GET["filtroProduto"])){
        $filtroProduto = $_GET["filtroProduto"];
        if ($filtroProduto != "todos"){ 
            $listarProdutos = "SELECT * FROM Produtos WHERE statusProduto LIKE '$filtroProduto' ORDER BY statusProduto";
        }
        switch($filtroProduto){
            case "todos" : $mensagemFiltro = "no total";
            break;

            case "disponivel" : $mensagemFiltro = "que ainda estão disponíveis";
            break;

            case "vendido" : $mensagemFiltro = "que já foram vendidos";
            break;
        }
    } else{
        $mensagemFiltro = "no total";
    }

    $res = mysqli_query($link, $listarProdutos); //Executa o comando de listagem
    $totalProdutos = mysqli_num_rows($res); //Função para retornar a quantidade de registros da tabela
    if($totalProdutos > 0){
        $nomePagina = $_SERVER['SCRIPT_NAME']; // ou $_SERVER['PHP_SELF']
        $info_arquivo = pathinfo($nomePagina);
        $pagina = $info_arquivo['filename'];

        if($totalProdutos == 1){
            echo "<div class='alert alert-success text-center'><h4>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro!</h4></div>";
        }
        else{
            echo "<div class='alert alert-success text-center'><h4>Há <strong>$totalProdutos</strong> produtos $mensagemFiltro!</h4></div>";
        }
        echo "
        <form name='formFiltro' action='index.php?pagina=$pagina' method='GET'>
            <select class='form-select form-select-lg' name='filtroProduto' required>
                <option value='todos'"; if($filtroProduto == 'todos') { echo "selected"; }; echo ">Visualizar Todos os Produtos</option>
                <option value='disponivel'"; if($filtroProduto == 'disponivel') { echo "selected"; }; echo ">Visualizar apenas Produtos Disponíveis</option>
                <option value='vendido'"; if($filtroProduto == 'vendido') { echo "selected"; }; echo ">Visualizar apenas Produtos Vendidos</option>
            </select><br>
            <button type='submit' class='btn btn-success' style='float:right'>Filtrar Produtos</button><br>
        </form>
        <hr>";

        //Monta a tabela para exibir os registros encontrados
        echo "
                    <div class='row'>";

                        // Varre a tabela em busca de registros e armazena em um array
                        //Enquanto houverem dados na linha da tabela, atribui o valor atual do array a uma variável
                        while($registro = mysqli_fetch_assoc($res)){
                            $idProduto        = $registro["idProduto"];
                            $fotoProduto      = $registro["fotoProduto"];
                            $nomeProduto      = $registro["nomeProduto"];
                            $descricaoProduto = $registro["descricaoProduto"];
                            $precoProduto     = $registro["precoProduto"];
                            $listConsole     = $registro["listConsole"];
                            //$vendedorProduto  = $registro["Usuarios_idUsuario"];
                            $dataProduto      = $registro["dataProduto"];
                            //$horaProduto      = $registro["horaProduto"];
                            $statusProduto    = $registro["statusProduto"];

                            $diaProduto  = substr($dataProduto, 8, 2);
                            $mesProduto  = substr($dataProduto, 5, 2);
                            $anoProduto  = substr($dataProduto, 0, 4);

                            $dataProduto = ("$diaProduto/$mesProduto/$anoProduto");

                            $precoProduto = str_replace('.', ',', $precoProduto); //Substitui os pontos por vírgulas para exibir o valor do Produto.

                            echo "
                            <div class='col-sm-6 col-md-3 col-xl-2' style='margin-bottom:30px;'>
                                <div class='card' style='width:100%; height:100%;'>
                                    <div class='card-body' style='height:100% '>
                                        <a href='visualizarProduto.php?pagina=formProduto&idProduto=$idProduto' style='text-decoration:none;' title='Visualizar Produto de $nomeProduto' "; if ($statusProduto == 'vendido' or $statusProduto == "reservado") {echo "class='nav-link disabled'";} echo ">
                                            <img class='card-img-top' src='$fotoProduto' alt='Foto de $nomeProduto' "; if($statusProduto == 'vendido' or $statusProduto == 'reservado'){echo "style='filter:grayscale(100%)';";} echo ">
                                        </a>
                                    </div>
                                    <div class='card-body text-center'>
                                        <h4 class='card-title'>$nomeProduto</h4>
                                        <p class='card-text'>Valor: <b>R$ $precoProduto</b></p>
                                        <div class='d-grid' style='border-size:border-box'>";

                                            if($statusProduto == 'disponivel'){
                                                echo"
                                                <a class='btn btn-success' href='visualizarProduto.php?pagina=formProduto&idProduto=$idProduto' style='text-decoration:none;'  title='Visualizar Produto de $nomeProduto'>
                                                    Visualizar Produto
                                                </a>";    
                                            }
                                            if($statusProduto == 'vendido'){
                                                echo"
                                                <span class='btn btn-danger disabled'>
                                                    Vendido
                                                </span>";
                                            }
                                            elseif($statusProduto == 'reservado'){
                                                echo"
                                                <span class='btn btn-danger disabled'>
                                                    Reservado
                                                </span>";
                                            }
                                        echo"
                                        </div>
                                    </div>
                                </div>
                            </div>";
                        }
                echo"</div>";
            
    }
    else{
        echo "<div class='alert alert-warning text-center'>Não há produtos à venda! <i class='bi bi-emoji-frown'></i></div>";
    }

?>


<?php include("footer.php"); ?>



















































































































<!-- 
 
            
    -->