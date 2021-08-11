<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
$logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
$bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
$numero = mysqli_real_escape_string($conn, $_POST['numero']);



$result_posto = "UPDATE posto SET nome='$nome', email='$email', telefone='$telefone', logradouro='$logradouro', email='$email', bairro='$bairro', numero='$numero' WHERE id = '$id'";
$resultado_posto = mysqli_query($conn, $result_posto);

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary'>Alterado com Sucesso!</div>";
    header("Location: formpsf.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
