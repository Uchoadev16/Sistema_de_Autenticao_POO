<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/projetos php/Autenticação 2.0/app/model/model_usuario.php');

class controller_usuario
{
    private $model_usuario;

    function __construct()
    {
        $this->model_usuario = new model_usuario;
    }
    function cadastrar($nome, $email, $telefone, $senha)
    {

        $result_cadastro = $this->model_usuario->cadastrar($nome, $email, $telefone, $senha);
        header('location:view/cadastro/cadastrado.php?resposta=' . $result_cadastro);
    }
    function logar($email, $senha)
    {

        $result_logar = $this->model_usuario->logar($email, $senha);
        if ($result_logar == "usuário logado!") {

            header('location:view/conta/conta.php?resposta=' . $result_logar);
        } else {
            header('location:view/login/logar.php?resposta=' . $result_logar);
        }
    }
    function recuperar($telefone)
    {

        $result_recuperar = $this->model_usuario->recuperar($telefone);
        if ($result_recuperar > 0) {

            header('location:view/recuperaSenha/EditSenha.php?telefone=' . $telefone);
        } else {

            header('location:view/recuperaSenha/recSenha.php?erro');
        }
    }
    function editSenha($NovaSenha, $telefone){

        $result_edit = $this->model_usuario->editSenha($NovaSenha, $telefone);

        header('location:view/recuperaSenha/EditSenha.php?resposta='. $result_edit);
    }
}
