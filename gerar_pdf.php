<?php

require 'vendor/autoload.php';
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

$html = '
<style>
  body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
  h1 { color: #000000ff; border-bottom;}
  h3 { color: #333; margin-top: 20px; }
  img { border-radius: 10px; }
  ul { padding: 0; }
  li { margin-bottom: 5px; }
  .badge { background: #0d6efd; color: #fff; padding: 4px 8px; border-radius: 5px; margin: 2px; display: inline-block; }
</style>

<h1>'.$nome.'</h1>
<p><strong>Email:</strong> '.$email.'<br>
<strong>Telefone:</strong> '.$telefone.'<br>
<strong>Data de Nascimento:</strong> '.$nascimento.'<br>
<strong>Idade:</strong> '.$idade.'</p>';

if ($foto) {
  $html .= '<img src="'.$foto.'" width="100"><br>';
}

$html .= '
<h3>Formação Acadêmica:</h3><ul>';
for ($i = 0; $i < count($cursos); $i++) {
  $html .= '<li><strong>'.htmlspecialchars($cursos[$i]).'</strong> - '.htmlspecialchars($instituicoes[$i]).' ('.htmlspecialchars($anos[$i]).')</li>';
}
$html .= '</ul>';

$html .= '
<h3>Experiência Profissional:</h3><ul>';
for ($i = 0; $i < count($empresas); $i++) {
  $html .= '<li><strong>'.htmlspecialchars($cargos[$i]).'</strong> - '.htmlspecialchars($empresas[$i]).'<br>'.htmlspecialchars($descricoes[$i]).'</li>';
}
$html .= '</ul>';

$html .= '<h3>Habilidades:</h3>';
foreach ($habilidades as $h) {
  $html .= '<span class="badge">'.$h.'</span> ';
  
}

// Carrega o conteúdo no Dompdf
$dompdf->loadHtml($html);

// Define o tamanho do papel e orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza o PDF
$dompdf->render();
ob_end_clean();
$dompdf->stream("Curriculo_$nome.pdf", ["Attachment" => true]);
exit;


// Faz o download automático
$dompdf->stream("Curriculo_$nome.pdf", ["Attachment" => true]);
