<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/projetos php/Autenticação 2.0/app/config/connect.php');


class model_usuario extends connect
{

    private $table_cadastrados;

    function __construct()
    {
        parent::__construct();
        $this->table_cadastrados = 'cadastrados';
    }

    function cadastrar($nome, $email, $telefone, $senha)
    {

        $result_check = $this->connect->prepare("SELECT * FROM cadastrados WHERE Nome = :nome OR Email = :email OR telefone = :telefone");

        $result_check->bindParam(':nome', $nome);
        $result_check->bindParam(':email', $email);
        $result_check->bindParam(':telefone', $telefone);

        $result_check->execute();

        if ($result_check->rowCount() < 1) {

            $result_cadastro = $this->connect->prepare("INSERT INTO cadastrados VALUES (DEFAULT, :nome, :email, :telefone, MD5(:senha))");

            $result_cadastro->bindParam(':nome', $nome);
            $result_cadastro->bindParam(':email', $email);
            $result_cadastro->bindParam(':telefone', $telefone);
            $result_cadastro->bindParam(':senha', $senha);

            $result_cadastro->execute();

            if ($result_cadastro) {

                return "Cadastrado com sucesso!";
            } else {

                return "Erro ao cadastrar!";
            }
        } else {

            return "usuario já cadastrado!";
        }
    }

    function logar($email, $senha)
    {
        $result_logar = $this->connect->prepare("SELECT * FROM cadastrados WHERE Email = :email and senha = MD5(:senha)");

        $result_logar->bindParam(':email', $email);
        $result_logar->bindParam(':senha', $senha);

        $result_logar->execute();

        if($result_logar->rowCount() > 0) {

            return "usuário logado!";
        } else {

            return "senha ou Email incorretos!";
        }
    }

    function recuperar($telefone)
    {
        $result_rec = $this->connect->prepare("SELECT * FROM cadastrados WHERE telefone = :telefone");

        $result_rec->bindParam(':telefone', $telefone);

        $result_rec->execute();

        if ($result_rec->rowCount() > 0) {

            return $telefone;
        } else {

            return 0;
        }
    }

    function editSenha($NovaSenha, $telefone)
    {

        $result_edit = $this->connect->prepare("UPDATE cadastrados SET senha = MD5(:NovaSenha) WHERE telefone = :telefone LIMIT 1");

        $result_edit->bindParam(':NovaSenha', $NovaSenha);
        $result_edit->bindParam(':telefone', $telefone);
        
        $result_edit->execute();
        
        if ($result_edit) {

            return "Senha editada com sucesso!";
        } else {

            return "[ERRO] ao editar a senha!";
        }
    }
}
