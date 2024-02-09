<?php include("header.php"); ?>

    <?php
        include("conexaoBD.php");
        $listarClientes = "SELECT * FROM Clientes"; //Seleciona todos os campos da tabela Produtos
        $res = mysqli_query($link, $listarClientes); //Executa o comando de listagem
        $totalClientes = mysqli_num_rows($res); //Função para retornar a quantidade de registros da tabela
    ?>

            <div class="w3-container w3-text-grey">

                <?php
                    if($totalClientes > 0){
                        if($totalClientes == 1){
                            echo "<div class='alert alert-success text-center'<strong>$totalClientes</strong> cliente</div><br>";
                        }
                        else{
                            echo "<div class='alert alert-success text-center'><strong>$totalClientes</strong> clientes</div><br>";
                        }
                    
                ?>
             
            </div>

            <!-- Monta a Grid com os produtos -->

            <?php
                echo "
                    <div class='w3-row'>";
                            while($registro = mysqli_fetch_assoc($res)){
                                $idCliente        = $registro["idCliente"];
                                $nomeCliente      = $registro["nomeCliente"];
                                $emailCliente     = $registro["emailCliente"];
                                $senhaCliente     = $registro["senhaCliente"];
                                $fotoCliente      = $registro["fotoCliente"];

                                echo "
                                    <div class='w3-col l3 s6'>
                                    <div class='w3-container'>
                                        <img src='$fotoCliente' class='img-fluid' style='width:100%; height: 30vh'>
                                        <p>$nomeCliente<br><b>$emailCliente</b></p>
                                    </div>
                                </div>";

                            }
                        
                    ?>

                <?php } ?>
            </div>

<?php include("footer.php"); ?>