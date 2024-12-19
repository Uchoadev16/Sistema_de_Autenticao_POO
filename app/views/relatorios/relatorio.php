<?php
//criando a função 
function lista_cadastrado()
{
    //requerindo os a class sessions para chamar as funções para autenticar a sessão e o tempo dela
    require_once('../../models/sessions.php');
    $session = new sessions();
    $session->autenticar_session();
    $session->tempo_session(60);

    //requerindo a class connect para se conectar ao banco
    require_once('../../config/connect.php');
    $connect = new connect();

    //requerindo a biblioteca fpdf
    require_once('../../assets/FPDF/fpdf.php');

    //estanciando a class FPDF
    $fpdf = new FPDF('P', 'pt', 'A4');

    //criando um pdf
    $fpdf->AddPage();

    //quebrando linhas
    $fpdf->Ln(40);
    //configurando o tipo, tamanho, cor... das celulas
    $fpdf->SetFont('Arial', 'B', 24);
    $fpdf->SetFillColor(55, 55, 200);
    $fpdf->SetTextColor(255, 255, 255);
    $fpdf->Cell(540, 40, 'Lista de cadastrados', 0, 1, 'C', true);
    $fpdf->Ln(20);

    $fpdf->SetFont('Arial', '', 16);
    $fpdf->SetFillColor(55, 55, 200);
    $fpdf->SetTextColor(255, 255, 255);
    $fpdf->Cell(30, 30, 'ID', 1, 0, 'C', true);
    $fpdf->Cell(165, 30, 'Nome', 1, 0, 'C', true);
    $fpdf->Cell(245, 30, 'Email', 1, 0, 'C', true);
    $fpdf->Cell(100, 30, 'telefone', 1, 1, 'C', true);


    $fpdf->SetFont('Arial', '', 14);
    $fpdf->SetTextColor(0, 0, 0);

    $id = 1;
    //chamando a função query_fetch_assoc para fazer o select no banco
    $matriz = $connect->query_fetch_assoc("SELECT * FROM cadastrados");

    //transformando a matriz em array com o foreach
    foreach ($matriz as $dados) {

        $cor = $id % 2 ? 255 : 195;
        $fpdf->SetFillColor($cor, $cor, $cor);
        $fpdf->Cell(30, 30, $id, 1, 0, 'C', true);
        $fpdf->Cell(165, 30, utf8_decode($dados['Nome']), 1, 0, 'L', true);
        $fpdf->Cell(245, 30, $dados['Email'], 1, 0, 'L', true);
        $fpdf->Cell(100, 30, $dados['telefone'], 1, 1, 'L', true);
        $id++;
    }

    $fpdf->Ln(15);

    $fpdf->SetFont('Arial', 'i', 12);
    $fpdf->Cell(0, 0, utf8_decode("@UCHÔA"), 0, 0, 'C');

    //fechando a pagina
    $fpdf->Output();
}
//chamando a função para mostra o pdf
lista_cadastrado();
