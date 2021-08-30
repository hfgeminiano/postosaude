<?php

require("logado.php");

$dia = $_POST['dia'];
$motivo = $_POST['motivo'];
$id_paciente = $_SESSION['id'];
$id_psf = $_SESSION['posto_id'];
include_once 'conexao.php';

$sql = "INSERT INTO assistencia(dia,estado,motivo,posto_id,usuario_id) VALUES ";
$sql .= "('$dia','Pre Agendado','$motivo','$id_psf','$id_paciente')";

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Pedido de Assistência Pré Agendado com Sucesso!</div>";
    header("Location: form_assistencia.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
