<?php

//requerindo o arquivo model_usuario.php
require_once('../models/model_usuario.php');

//criando a class
class controller_usuario
{
    //atributos
    private $model_usuario;

    //construtor
    function __construct()
    {
        //estanciando o objeto do arquivo model_usuario.php
        $this->model_usuario = new model_usuario;
    }

    //metodos
    function cadastrar($nome, $email, $telefone, $senha)
    {
        //chamando a função cadastrar do objeto model_usuario
        $result_cadastro = $this->model_usuario->cadastrar($nome, $email, $telefone, $senha);

        switch ($result_cadastro) {

            case 1:
                header('location:../views/cadastro/cadastrado.php?certo');
                exit();
                break;
            case 2:
                header('location:../views/cadastro/cadastrar.php?erro');
                exit();
                break;
            case 3:
                header('location:../views/cadastro/cadastrar.php?ja_existe');
                exit();
                break;
        }
    }
    function logar($email, $senha)
    {
        //chamando a função logar do objeto model_usuario
        $result_logar = $this->model_usuario->logar($email, $senha);
        if ($result_logar == 1) {

            header('location:../views/conta/conta.php');
            exit();
        } else if ($result_logar == 2) {

            header('location:../views/login/logar.php?erro');
            exit();
        }
    }
    function recuperar($telefone)
    {
        $result_recuperar = $this->model_usuario->recuperar($telefone);
        if ($result_recuperar > 0) {

            header('location:../views/recuperaSenha/EditSenha.php?telefone=' . $telefone);
            exit();
        } else {

            header('location:../views/recuperaSenha/recSenha.php?erro');
            exit();
        }
    }
    function editSenha($NovaSenha, $telefone)
    {
        $result_edit = $this->model_usuario->editSenha($NovaSenha, $telefone);

        switch ($result_edit) {

            case 1:
                header('location:../views/recuperaSenha/EditSenha.php?certo');
                exit();
                break;
            case 2:
                header('location:../views/recuperaSenha/EditSenha.php?erro');
                exit();
                break;
        }
    }
}
