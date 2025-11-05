<?php


use Dompdf\Dompdf;

// Cria o objeto Dompdf
$dompdf = new Dompdf();

// Recebe os dados novamente
$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$foto = $_POST['foto'];
$idade = $_POST['idade'] ?? '';
$cursos = $_POST['curso'];
$instituicoes = $_POST['instituicao'];
$anos = $_POST['ano'];

$empresas = $_POST['empresa'];
$cargos = $_POST['cargo'];
$descricoes = $_POST['descricao'];

$habilidades = $_POST['habilidade'];