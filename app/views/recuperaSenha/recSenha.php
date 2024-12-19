<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        button {
            margin-top: 50px;
            margin-left: 45px;
            margin-right: 0px;
        }
    </style>
</head>

<body>

    <div id="main">
        <div id="box">

            <h1>Insira o numero de telefone que você foi cadastrado:</h1>
            <div id="form">
                <form action="../../controllers/controller_main.php" method="post">
                    <label for="iTelefone">Telefone:</label>
                    <input type="tel" name="nTelefone" id="iTelefone"><br>

                    <button type="submit" name="RECsenha">Recuperar senha</button>
                </form>
            </div>
            <?php

            if (isset($_GET['erro'])) {

                echo "<p>[ERRO]Número de telefone não cadastrado!</p>";
            }
            ?>
        </div>
        <p>&copy;UcHôA</p>
    </div>
</body>

</html>