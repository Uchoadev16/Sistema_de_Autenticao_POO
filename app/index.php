<?php

require_once('controller/controller_usuario.php');
if (isset($_POST['cadastrar']) && !empty($_POST['nNome']) && !empty($_POST['nEmail']) && !empty($_POST['nTelefone']) && !empty($_POST['nSenha']) && !empty($_POST['nConfirma'])) {

    $nome = $_POST['nNome'];
    $email = $_POST['nEmail'];
    $telefone = $_POST['nTelefone'];
    $senha = $_POST['nSenha'];
    $confirma = $_POST['nConfirma'];

    if ($senha != $confirma) {

        header('location:view/cadastro/cadastrar.php?erroSenha');
    } else {


        $controller_c = new controller_usuario;
        $controller_c->cadastrar($nome, $email, $telefone, $senha);
    }
} else if (isset($_POST['logar']) && !empty($_POST['nEmail']) && !empty($_POST['nSenha'])) {

    $email = $_POST['nEmail'];
    $senha = $_POST['nSenha'];

    $controller_l = new controller_usuario;
    $controller_l->logar($email, $senha);
} else if (isset($_POST['RECsenha']) && !empty('nTelefone')) {

    $telefone = $_POST['nTelefone'];

    $controller_r = new controller_usuario;
    $controller_r->recuperar($telefone);
} else if (isset($_POST['NovaSenha']) && !empty($_POST['nNovaSenha']) && !empty($_POST['nConfirmar']) && !empty($_POST['ntelefone'])) {

    $NovaSenha = $_POST['NovaSenha'];
    $confirmar = $_POST['nConfirmar'];
    $telefone = $_POST['ntelefone'];

    if ($NovaSenha == $confirmar) {

        header('location:view/recuperaSenha/EditSenha.php?erroSenha');
    } else {
        $controller_e = new controller_usuario;
        $controller_e->editSenha($NovaSenha, $telefone);
    }
} else {
    header('location:../default.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

</body>

</html>