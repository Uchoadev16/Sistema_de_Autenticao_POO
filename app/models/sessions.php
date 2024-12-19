<?php

//iniciando uma sessão
session_start();
//criando a class sessions
class sessions
{
    //metodos
    function autenticar_session()
    {
        if (!isset($_SESSION['email']) == true && !isset($_SESSION['senha']) == true) {

            //fechando as sessions e redirecionando
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            header('location:../login/logar.php');
            exit();
        }
        $logado = $_SESSION['email'];
    }
    function tempo_session($tempo)
    {
        //se existir um tempo registrado
        if (isset($_SESSION['ultimo_acesso'])) {

            //se o tempo atual menos o tempo de login for menor que o tempo registrado
            if (time() - $_SESSION['ultimo_acesso'] > $tempo) {

                //fechando a session
                session_unset();
                //destruindo a session
                session_destroy();
                //redirecionando 
                header('location:../login/logar.php');
                exit();
            }
        }
        //registrando o tempo atual
        $_SESSION['ultimo_acesso']  = time();
    }
    function quebra_session()
    {
        //fechando a session
        session_unset();
        //destruindo a session
        session_destroy();
        //redirecionando 
        header('location:../views/login/logar.php');
        exit();
    }
}
