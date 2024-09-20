<?php include("header.php"); ?>

<?php
//Inclui o arquivo de conexão com o Banco de Dados
    include("conexaoBD.php");
    $marcaConsole = $_GET['marcaConsole'];
    
    if(true){
        
        $marca = $marcaConsole;
        
        if(isset($_GET['marcaConsole'])){
            $marcaConsole = $_GET['marcaConsole'];
            echo"<div class='p-4'>
            <h1> Tudo em $marcaConsole
            </div>";
            $listarProdutos = "SELECT * FROM Produtos WHERE marcaConsole LIKE '$marcaConsole' order by statusProduto";
            $marca = $marcaConsole;
        }

        if(isset($_POST['filtroConsole'])){
            $filtroConsole = $_POST['filtroConsole'];
            $listarProdutos = "SELECT * FROM Produtos WHERE listConsole like '$filtroConsole' order by statusProduto";
            $marcaConsole = $_GET['marcaConsole'];
        }

        
        $res = mysqli_query($link, $listarProdutos);
        $totalProdutos = mysqli_num_rows($res);


        if($totalProdutos > 0){
            
            if($marcaConsole == 'Playstation'){       
                echo "
                <form name='filtroConsole' action='listarProdutos.php?marcaConsole=Playstation' method='POST'>
                    <select class='form-select form-select-lg' name='filtroConsole' required>
                        <option value='PSONE'"; if($filtroConsole == 'PSONE') { echo "selected"; }; echo ">Playstation 1</option>
                        <option value='PS2'"; if($filtroConsole == 'PS2') { echo "selected"; }; echo ">Playstation 2</option>
                        <option value='PS3'"; if($filtroConsole == 'PS3') { echo "selected"; }; echo ">Playstation 3</option>
                        <option value='PS4'"; if($filtroConsole == 'PS4') { echo "selected"; }; echo ">Playstation 4</option>
                        <option value='PS5'"; if($filtroConsole == 'PS5') { echo "selected"; }; echo ">Playstation 5</option>
                        <option value='PSP'"; if($filtroConsole == 'PSP') { echo "selected"; }; echo ">Playstation Portable</option>
                        <option value='PSVITA'"; if($filtroConsole == 'PSVITA') { echo "selected"; }; echo ">Playstation Vita</option>
                    </select><br>
                    <button type='submit' class='btn btn-success' style='float:right'>Filtrar Produtos</button><br>
                </form>
                <hr>";
            }

            if($marcaConsole == 'Nintendo'){        
                echo "
                <form name='filtroConsole' action='listarProdutos.php?marcaConsole=Nintendo' method='POST'>
                    <select class='form-select form-select-lg' name='filtroConsole' required>
                        <option value='NES'"; if($filtroConsole == 'NES') { echo "selected"; }; echo ">Nintendinho</option>
                        <option value='SNES'"; if($filtroConsole == 'SNES') { echo "selected"; }; echo ">Super Nintendo</option>
                        <option value='N64'"; if($filtroConsole == 'N64') { echo "selected"; }; echo ">Nintendo 64</option>
                        <option value='NGC'"; if($filtroConsole == 'NGC') { echo "selected"; }; echo ">Nintendo GameCube</option>
                        <option value='WII'"; if($filtroConsole == 'WII') { echo "selected"; }; echo ">Nintendo WII</option>
                        <option value='DS'"; if($filtroConsole == 'DS') { echo "selected"; }; echo ">Nintendo DS</option>
                        <option value='3DS'"; if($filtroConsole == '3DS') { echo "selected"; }; echo ">Nintendo 3DS</option>
                        <option value='SWITCH'"; if($filtroConsole == 'SWITCH') { echo "selected"; }; echo ">Nintendo Switch</option>
                    </select><br>
                    <button type='submit' class='btn btn-success' style='float:right'>Filtrar Produtos</button><br>
                </form>
                <hr>";
            }

            if($marcaConsole == 'Xbox'){        
                echo "
                <form name='filtroConsole' action='listarProdutos.php?marcaConsole=Xbox' method='POST'>
                    <select class='form-select form-select-lg' name='filtroConsole' required>
                        <option value='XBOX'"; if($filtroConsole == 'XBOX') { echo "selected"; }; echo ">Xbox</option>
                        <option value='XBOX360'"; if($filtroConsole == 'XBOX360') { echo "selected"; }; echo ">Xbox 360</option>
                        <option value='XBOXONE'"; if($filtroConsole == 'XBOXONE') { echo "selected"; }; echo ">Xbox One</option>
                        <option value='XBOXSERIES'"; if($filtroConsole == 'XBOXSERIES') { echo "selected"; }; echo ">Xbox Series X</option>
                    </select><br>
                    <button type='submit' class='btn btn-success' style='float:right'>Filtrar Produtos</button><br>
                </form>
                <hr>";
            }

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
                                <div class='card-body' style='height:100%'>
                                    <a href='visualizarProduto.php?pagina=formProduto&idProduto=$idProduto' style='text-decoration:none;' title='Visualizar Produto de $nomeProduto' "; if ($statusProduto == 'vendido') {echo "class='nav-link disabled'";} echo ">
                                        <img class='card-img-top' src='$fotoProduto' alt='Foto de $nomeProduto' "; if($statusProduto == 'vendido'){echo "style='filter:grayscale(100%)';";} echo ">
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
                                        } elseif($statusProduto == 'vendido'){
                                            echo"
                                            <span class='btn btn-danger disabled'>
                                                Vendido
                                            </span>";
                                        }
                                    echo"
                                    </div>
                                </div>
                            </div>
                        </div>";
                    }
                echo "</div>";
        }
        else{
            echo "<div class='alert alert-warning text-center'>Não há produtos à venda! <i class='bi bi-emoji-frown'></i></div>";
        }
    }



?>

<?php include("footer.php"); ?>
