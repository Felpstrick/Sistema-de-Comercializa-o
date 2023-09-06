<?php include("header.php"); ?>

    <h2>Cadastrar Produto</h2>
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

    <form action="cadastrarProduto.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="fotoProduto">Foto:</label>
            <input type="file" class="btn btn-link" name="fotoProduto">
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Nome do Produto" name="nomeProduto" required>
            <label for="nomeProduto" class="form-label">*Nome do Produto:</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Preço do Produto" name="precoProduto" id="precoProduto" required>
            <label for="precoProduto" class="form-label" id="precoProduto">*Preço do Produto:</label>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Informe uma descrição do Produto" name="descricaoProduto" required>
            <label for="descricaoProduto" class="form-label" id="descricaoProduto">*Descrição do Produto:</label>
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
                <button type="submit" class="btn btn-outline-success">Cadastrar</button>
            </div>

    </form>


    <?php include("footer.php"); ?>