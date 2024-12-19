<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>logar</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        div#box {
            width: 350px;
            height: 325px;
        }

        a#CL {
            margin-left: 0px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="box">
            <h1>Logar:</h1>

            <div id="form">
                <form action="../../controllers/controller_main.php" method="post">
                    <label for="Email">E-mail:</label>
                    <input type="email" name="nEmail" id="iEmail"><br>
                    <label for="iSenha">Senha:</label>
                    <input type="password" name="nSenha" id="iSenha"><br>
                    <button type="submit" name="logar">Logar</button><br><br>
                </form>
            </div>
            <a id="CL" href="../cadastro/cadastrar.php" id="cr">Cadastrar</a><br>
            <a id="CL" href="../recuperaSenha/recSenha.php" id="cr">Recuperar senha</a>

            <?php

            if (isset($_GET['erro'])) {

                echo "<p>[ERRO]Email ou senha incorretos!</p>";
            }
            ?>
        </div>
        <p>&copy;UcHôA</p>
    </div>
</body>

</html>