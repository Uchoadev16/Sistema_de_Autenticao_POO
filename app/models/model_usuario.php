<?php
//requindo o arquivo para a conexão com o banco de dados
require_once('../config/connect.php');

//criando a class sendo herdada da class connect
class model_usuario extends connect
{
    //atributos
    private $table_cadastrados;

    //motodos especiais 
    function __construct()
    {
        //chamando o contrutor da class conect
        parent::__construct();
        //nome da tabela
        $this->table_cadastrados = 'cadastrados';
    }

    //metodos
    function cadastrar($nome, $email, $telefone, $senha)
    {
        //checando se já existe um usuario que os dados passados
        $result_check = $this->connect->prepare("SELECT * FROM cadastrados WHERE Nome = :nome OR Email = :email OR telefone = :telefone");
        $result_check->bindParam(':nome', $nome);
        $result_check->bindParam(':email', $email);
        $result_check->bindParam(':telefone', $telefone);
        $result_check->execute();

        if ($result_check->rowCount() < 1) {

            //cadastrando o usuairo no banco
            $result_cadastro = $this->connect->prepare("INSERT INTO cadastrados VALUES (DEFAULT, :nome, :email, :telefone, MD5(:senha))");

            $result_cadastro->bindParam(':nome', $nome);
            $result_cadastro->bindParam(':email', $email);
            $result_cadastro->bindParam(':telefone', $telefone);
            $result_cadastro->bindParam(':senha', $senha);

            $result_cadastro->execute();

            if ($result_cadastro) {

                return 1;
            } else {

                return 2;
            }
        } else {

            return 3;
        }
    }

    function logar($email, $senha)
    {
        //iniciando um sessão
        session_start();
        $result_logar = $this->connect->prepare("SELECT * FROM cadastrados WHERE Email = :Email AND senha = MD5(:senha)");
        $result_logar->bindValue(':Email', $email);
        $result_logar->bindValue(':senha', $senha);
        $result_logar->execute();

        //se existir um usuario no banco
        if ($result_logar->rowCount() > 0) {

            //criando uma sessão com email e senha
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            return 1;
        } else {

            //se não, fecha qualquer sessão aberta
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            return 2;
        }
    }
    function recuperar($telefone)
    {
        //procurando se existe um telefone cadastrado 
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
        //recuperando a senha do usuario 
        $result_edit = $this->connect->prepare("UPDATE cadastrados SET senha = MD5(:NovaSenha) WHERE telefone = :telefone");
        $result_edit->bindParam(':NovaSenha', $NovaSenha);
        $result_edit->bindParam(':telefone', $telefone);
        $result_edit->execute();

        if ($result_edit) {

            return 1;
        } else {

            return 2;
        }
    }
}
