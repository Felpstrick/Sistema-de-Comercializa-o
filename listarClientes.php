
<?php include("header.php"); ?>

    <?php
        include("conexaoBD.php");
        $listarClientes = "SELECT * FROM Clientes ORDER BY tipoCliente"; //Seleciona todos os campos da tabela Produtos
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
                    }
                    
                ?>
             
            </div>

            <!-- Monta a Grid com os produtos -->

<html>
    <body>
        <div class="conteiner-fluid">
            <div class="p-4">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Nível de Acesso</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>CPF</th>
                        <th>Senha</th>
                        <th>---</th>
                    </tr>
                    <?php
                        while($registro = mysqli_fetch_assoc($res))
                        {
                            $idCliente = $registro['idCliente']; 
                            echo"<tr>";
                            echo"<td>$idCliente</td>";
                            echo"<td>".$registro['nomeCliente']."</td>";
                            echo"<td>".$registro['tipoCliente']."</td>";
                            echo"<td>".$registro['emailCliente']."</td>";
                            echo"<td>".$registro['telefoneCliente']."</td>";
                            echo"<td>".$registro['cpfCliente']."</td>";
                            echo"<td>".$registro['senhaCliente']."</td>";
                            echo"<td><button class='btn btn-danger' onclick= 'return confirmarOperacao()'><a href='excluirCliente.php?idCliente=$idCliente'>
                                <svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='25' height='25' viewBox='0 0 30 30'>
                                <path d='M 14.984375 2.4863281 A 1.0001 1.0001 0 0 0 14 3.5 L 14 4 L 8.5 4 A 1.0001 1.0001 0 0 0 7.4863281 5 L 6 5 A 1.0001 1.0001 0 1 0 6 7 L 24 7 A 1.0001 1.0001 0 1 0 24 5 L 22.513672 5 A 1.0001 1.0001 0 0 0 21.5 4 L 16 4 L 16 3.5 A 1.0001 1.0001 0 0 0 14.984375 2.4863281 z M 6 9 L 7.7929688 24.234375 C 7.9109687 25.241375 8.7633438 26 9.7773438 26 L 20.222656 26 C 21.236656 26 22.088031 25.241375 22.207031 24.234375 L 24 9 L 6 9 z'></path>
                                </svg>
                            </a></button></td>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </body>


</html>

            

<?php include("footer.php"); ?>





   
