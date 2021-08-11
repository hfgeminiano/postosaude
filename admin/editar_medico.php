<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$crm = mysqli_real_escape_string($conn, $_POST['crm']);

$result_medico = "UPDATE medico SET nome='$nome', crm='$crm' WHERE id = '$id'";
$resultado_medico = mysqli_query($conn, $result_medico);

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary'>Alterado com Sucesso!</div>";
    header("Location: formmedicos.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
