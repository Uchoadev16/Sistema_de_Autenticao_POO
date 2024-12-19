<?php

if (isset($_GET['telefone'])) {

    $telefone = $_GET['telefone'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        div#box {
            height: 350px;
        }

        button {
            margin-top: 40px;
            margin-left: 60px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="box">
            <h1>Crie sua nova senha</h1>
            <div id="form">
                <form action="../../controllers/controller_main.php" method="post">
                    <label for="iNovaSenha">Nova senha:</label>
                    <input type="password" name="nNovaSenha" id="iNovaSenha"><br>
                    <label for="iConfirmar">Confirmar senha:</label>
                    <input type="password" name="nConfirmar" id="iConfirmar"><br>
                    <input type="hidden" name="ntelefone" value="<?= $telefone ?>">

                    <button type="submit" name="edit_senha">Editar senha</button><br><br>
                </form>
            </div>

            <a id="CL" href="../login/logar.php">Logar</a>

            <?php
            if (isset($_GET['certo'])) {

                echo "<p>Senha alterada com sucesso!</p>";
            }
            if (isset($_GET['erro'])) {

                echo "<p>[ERRO] ao editar a senha!</p>";
            }
            if (isset($_GET['erroSenha'])) {

                echo "<p>As senha não condizem!</p>";
            }
            ?>
        </div>
        <p>&copy;UcHôA</p>
    </div>
</body>

</html>