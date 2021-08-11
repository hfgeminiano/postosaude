<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$medico = mysqli_real_escape_string($conn, $_POST['medico']);
$obs = mysqli_real_escape_string($conn, $_POST['obs']);
$estado = mysqli_real_escape_string($conn, 'Atendido');

$result_consulta = "UPDATE consulta SET medico_id='$medico', estado='$estado',observacao='$obs' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Atendido com Sucesso!</div>";
    header("Location: posto.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
