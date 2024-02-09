<?php include("header.php") ?>

    <?php
        if (isset($_GET["erroLogin"])){
            $erroLogin = $_GET["erroLogin"];
            if ($erroLogin == "dadosInvalidos"){
                echo "<div class='alert alert-danger text-center' style='text-align:center';><strong>USUÁRIO</strong> ou <strong>SENHA</strong> inválidos!</div>";
            }
            if ($erroLogin == "naoLogado"){
                echo "<div class='alert alert-danger text-center' style='text-align:center';><strong>USUÁRIO</strong> não logado!</div>";
            }
            if ($erroLogin == "acessoProibido"){
                echo "<div class='alert alert-danger text-center' style='text-align:center';>Você precisa logar como <strong>administrador</strong> para acessar essa página!</div>";
            }
            if ($erroLogin == "timeOut"){
                echo "<div class='alert alert-danger text-center' style='text-align:center';>Você ficou inativo por mais de 5 minutos e foi <strong>desconectado</strong> do sistema!</div>";
            }
        }
    ?>

    <h2>Login</h2>

    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />

    <form action="actionLogin.php" method="POST" enctype="multipart/form-data">

        <div class="form">
            <input type="text" class="form-control" placeholder="Email" name="emailCliente" id="emailCliente" required>
        </div>

        <div class="form">
            <input type="password" class="form-control" placeholder="Senha" name="senhaCliente" id="senhaCliente" required>
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
            <input type="submit" class="w3-button w3-black w3-padding-large w3-large" value="entrar" id="entrar" name="submit"><br>
        </div>

    </form>
    <br>
    <p>
    Ainda não possui cadastro? <a href="formCliente.php?pagina=formUsuario" title="Cadastrar-se">Clique aqui!</a>&nbsp<i class="bi bi-emoji-smile"></i>
    </p>

<?php include("footer.php"); ?>

