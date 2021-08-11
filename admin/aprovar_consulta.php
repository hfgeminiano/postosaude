<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$dia = mysqli_real_escape_string($conn, $_POST['dia']);
$estado = mysqli_real_escape_string($conn, 'Agendado');

$result_consulta = "UPDATE consulta SET dia='$dia', estado='$estado' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Alterado com Sucesso!</div>";
    header("Location: posto.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
