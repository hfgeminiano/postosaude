<?php

require("logado.php");

$dia = $_POST['dia'];
$dependente = $_POST['paciente'];
$motivo = $_POST['motivo'];
$id_paciente = $_SESSION['id'];
$tipo_paciente = $_POST['tipo'];
$id_psf = $_SESSION['posto_id'];
include_once 'conexao.php';


if ($tipo_paciente == 0) {
    $sql = "INSERT INTO consulta(dia,estado,motivo,tipo_paciente,posto_id,usuario_id) VALUES ";
    $sql .= "('$dia','Pre Agendado','$motivo','$tipo_paciente','$id_psf','$id_paciente')";
} else {
    $sql = "INSERT INTO consulta(dia,estado,tipo_paciente,motivo,posto_id,dependentes_id,usuario_id) VALUES ";
    $sql .= "('$dia','Pre Agendado','$tipo_paciente','$motivo','$id_psf','$dependente','$id_paciente')";
}


mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Consulta Pré Agendada com Sucesso!</div>";
    header("Location: formconsulta.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
