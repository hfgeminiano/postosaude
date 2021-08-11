<?php

require("logado.php");

$tipo = $_POST['tipo'];
$id_paciente = $_SESSION['id'];
$id_psf = $_SESSION['posto_id'];
$laboratorio = $_POST['laboratorio'];
include_once 'conexao.php';

$sql = "INSERT INTO exame(tipo,estado,usuario_id,posto_id,laboratorio_id) VALUES ";
$sql .= "('$tipo','Pre Agendado','$id_paciente','$id_psf','$laboratorio')";

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");


if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-success text-center'>Cadastrado com Sucesso! </div>";
    header("Location: formexame.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
