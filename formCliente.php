<?php include("header.php"); ?>

    <h2>Cadastrar Cliente</h2>
    <style>
            input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            }

            input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            }

            input[type=submit]:hover {
            background-color: #45a049;
            }

            div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
            }
        </style>

    <form action="cadastrarCliente.php" method="POST" enctype="multipart/form-data">
       
    
        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Informe o seu nome Completo" name="nomeCliente" required>
            <label for="nomeCliente" class="form-label">*Nome:</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Informe o Email" name="emailCliente" required>
            <label for="emailCliente" class="form-label">*Email:</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" placeholder="Informe a Senha" name="senhaCliente" required>
            <label for="senhaCliente" class="form-label">*Senha:</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" placeholder="Confirme a Senha" name="confirmarSenhaCliente" required>
            <label for="confirmarSenhaCliente" class="form-label">*Confirme a Senha:</label>
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            </div>

        

    </form>


    <?php include("footer.php"); ?>