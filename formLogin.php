<?php include("header.php") ?>

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

    <form action="#" method="POST" enctype="multipart/form-data">

        <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" placeholder="Email" name="EmailCliente" required>
        </div>

        <div class="form-floating mb-3 mt-3">
            <input type="password" class="form-control" placeholder="Senha" name="senhaCliente" required>  
        </div>
        <div style="margin-top:30px; margin-bottom:30px;">
                <button type="submit" class="btn btn-outline-success">Entrar</button>
            </div>

    </form>

    <?php include("footer.php"); ?>

