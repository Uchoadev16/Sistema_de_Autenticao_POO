<?php
//requerindo os a class sessions para chamar as funções para autenticar a sessão e o tempo dela
require_once('../../models/sessions.php');
$session = new sessions();
$session->tempo_session(600);
$session->autenticar_session();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
        }

        body {
            margin: auto;
            background-color: #1E1E2A;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        div#box {
            border: 2.5px solid #003E7D;
            border-radius: 24px;
            text-align: center;
            margin: 50px 100px auto 100px;
            height: 450px;
            width: 400px;
            box-shadow: 3px 3px 5px black;
        }

        div#form {
            text-align: left;
            margin: 13px 13px 13px 13px;
            font-size: 20px;
        }

        label {
            color: white;
        }

        input {
            border-radius: 24px;
            width: 150px;
            height: 20px;
            font-size: 17px;
        }

        button {
            background: none;
            border: 2px solid white;
            border-radius: 24px;
            margin-top: 30px;
            margin-left: 110px;
            font-size: 30px;
            transition: 0.5s;
        }

        button:hover {
            box-shadow: 2px 2px 2px black;
            color: #F4990E;
            font-style: italic;
            border-color: #F4990E;
        }

        h1 {
            color: #9B40C8;
            font-weight: normal;
            font-size: 35px;
        }

        h1:hover {
            font-style: italic;
        }

        a {
            border: 2px solid #DAD1CD;
            border-radius: 24px;
            padding: 5px 10px 5px 10px;
            color: #DAD1CD;
            text-decoration: none;
            font-size: 32px;
            transition: 0.5;
        }

        a:hover {
            box-shadow: 2px 2px 2px black;
            color: #F4990E;
            font-style: italic;
            border-color: #F4990E;
        }

        p {
            color: white;
            text-align: center;
        }

        a#CL {
            font-size: 17px;
            margin-left: -320px;
            color: white;
            border: none;
            text-decoration: underline;
        }

        a#sair {
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 17px;
            color: white;
            border: none;
            text-decoration: underline;
            z-index: 9999;
        }
    </style>
</head>

<body>

    <div id="box">
        <h1>bem-vindo</h1><br>
        <a id="ver" href="../relatorios/relatorio.php">ver contas</a>
    </div>
    <a id="sair" href="../../controllers/controller_main.php?sair">Sair</a>

</body>

</html>