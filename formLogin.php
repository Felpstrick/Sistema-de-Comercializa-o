<?php include("header.php")?>

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

    
    <div class="d-flex justify-content-center mb-3">
        
        <div class="row">
            <div class="p-4">
                <h2>Login</h2>
            </div>
            <div class="col-12">
                <form action="actionLogin.php" method="POST" class="was-validated">
                    <div class="form-floating mb-3 mt-3">
                        <input type="email" class="form-control" id="emailCliente" placeholder="Email" name="emailCliente" required>
                        <label for="emailCliente">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="senhaCliente" placeholder="Senha" name="senhaCliente" required>
                        <label for="senhaCliente">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn btn-success">Login</button>
                </form>
            </div>
        </div>
    </div>
    <br>
    <p class="d-flex justify-content-center">
    Ainda não possui cadastro? <a href="formCliente.php?pagina=formUsuario" title="Cadastrar-se">Clique aqui!</a>&nbsp<i class="bi bi-emoji-smile"></i>
    </p>

<?php include("footer.php"); ?>

