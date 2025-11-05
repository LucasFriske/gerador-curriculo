<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['nome'];
  $nascimento = $_POST['nascimento'] ?? '';
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $endereco = $_POST['endereco'];
if (!empty($nascimento)){
$dob = new DateTime($nascimento);
$now = new DateTime();
$diff = $now->diff($dob);
$idade = $diff->y;
} else {
    $idade = '';
}


  // Upload da foto (opcional)
  $foto = "";
  if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $fotoNome = "uploads/" . basename($_FILES['foto']['name']);
    move_uploaded_file($_FILES['foto']['tmp_name'], $fotoNome);
    $foto = $fotoNome;
  }

  $cursos = $_POST['curso'];
  $instituicoes = $_POST['instituicao'];
  $anos = $_POST['ano'];

  $empresas = $_POST['empresa'];
  $cargos = $_POST['cargo'];
  $descricoes = $_POST['descricao'];

  $habilidades = $_POST['habilidade'];
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Currículo de <?= htmlspecialchars($nome) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark py-5">
  <div class="container bg-white p-5 rounded shadow">

    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="mb-0"><?= htmlspecialchars($nome) ?></h1>
        <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
        <p class="mb-1"><strong>Telefone:</strong> <?= htmlspecialchars($telefone) ?></p>
        <p class="mb-1"><strong>Endereço:</strong> <?= htmlspecialchars($endereco) ?></p>
        <p class="mb-1"><strong>Data de Nascimento:</strong> <?= htmlspecialchars($nascimento) ?></p>
        <p class="mb-1"><strong>Idade:</strong> <?= htmlspecialchars($idade) ?></p>
      </div>

      <?php if ($foto): ?>
        <img src="<?= htmlspecialchars($foto) ?>" alt="foto" class="rounded" width="120">
      <?php endif; ?>
    </div>

    <hr>

    <h3>Formação Acadêmica</h3>
    <ul class="list-group mb-4">
      <?php for ($i = 0; $i < count($cursos); $i++): ?>
        <li class="list-group-item">
          <strong><?= htmlspecialchars($cursos[$i]) ?></strong> - <?= htmlspecialchars($instituicoes[$i]) ?> (<?= htmlspecialchars($anos[$i]) ?>)
        </li>
      <?php endfor; ?>
    </ul>

    <h3>Experiência Profissional</h3>
    <ul class="list-group mb-4">
      <?php for ($i = 0; $i < count($empresas); $i++): ?>
        <li class="list-group-item">
          <strong><?= htmlspecialchars($cargos[$i]) ?></strong> - <?= htmlspecialchars($empresas[$i]) ?><br>
          <small><?= nl2br(htmlspecialchars($descricoes[$i])) ?></small>
        </li>
      <?php endfor; ?>
    </ul>

    <h3>Habilidades</h3>
    <div class="mb-3">
      <?php foreach ($habilidades as $h): ?>
        <span class="badge bg-primary me-1"><?= htmlspecialchars($h) ?></span>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-4">
      <a href="index.php" class="btn btn-outline-secondary">Voltar</a>
    </div>

    <div class="text-center mt-3">
  <form action="gerar_pdf.php" method="POST" target="_blank">
    <?php
      // Reenvia todos os dados como inputs ocultos
      foreach ($_POST as $key => $values) {
        if (is_array($values)) {
          foreach ($values as $v) {
            echo '<input type="hidden" name="'.$key.'[]" value="'.htmlspecialchars($v).'">';
          }
        } else {
          echo '<input type="hidden" name="'.$key.'" value="'.htmlspecialchars($values).'">';
        }
      }

      if ($foto) {
        echo '<input type="hidden" name="foto" value="'.htmlspecialchars($foto).'">';
      }
    ?>
    <button type="submit" class="btn btn-danger">
      📄 Baixar Currículo em PDF
    </button>
  </form>
  
</div>

  </div>
</body>
</html>