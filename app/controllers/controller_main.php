<?php

require_once('controller_usuario.php');
if (isset($_POST['cadastrar']) && !empty($_POST['nNome']) && !empty($_POST['nEmail']) && !empty($_POST['nTelefone']) && !empty($_POST['nSenha']) && !empty($_POST['nConfirma'])) {

    $nome = $_POST['nNome'];
    $email = $_POST['nEmail'];
    $telefone = $_POST['nTelefone'];
    $senha = $_POST['nSenha'];
    $confirma = $_POST['nConfirma'];

    if ($senha != $confirma) {

        header('location:../views/cadastro/cadastrar.php?erroSenha');
        exit();
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

} else if (isset($_POST['edit_senha']) && !empty($_POST['nNovaSenha']) && !empty($_POST['nConfirmar']) && !empty($_POST['ntelefone'])) {

    echo $NovaSenha = $_POST['nNovaSenha'];
    $confirmar = $_POST['nConfirmar'];
    echo $telefone = $_POST['ntelefone'];

    if ($NovaSenha !== $confirmar) {

        header('location:../views/recuperaSenha/EditSenha.php?erroSenha');
        exit();
    } else {
        $controller_e = new controller_usuario;
        $controller_e->editSenha($NovaSenha, $telefone);
    }
} else if(isset($_GET['sair'])){

    require_once('../models/sessions.php');

    $session = new sessions();
    $session->quebra_session();
}else {
    header('location:../../default.php');
    exit();
}
