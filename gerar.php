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