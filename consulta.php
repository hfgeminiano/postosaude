<?php

require("logado.php");

$dia = $_POST['dia'];
$horario = $_POST['horario'];
$dependente = $_POST['paciente'];
$id_paciente = $_SESSION['id'];
$tipo_paciente = $_POST['tipo'];
include_once 'conexao.php';


if ($tipo_paciente == 0) {
    $sql = "INSERT INTO consulta(dia,horario,estado,tipo_paciente,id_usuario) VALUES ";
    $sql .= "('$dia','$horario','Agendado','$tipo_paciente','$id_paciente')";
} else {
    $sql = "INSERT INTO consulta(dia,horario,estado,tipo_paciente,id_usuario,id_dependente) VALUES ";
    $sql .= "('$dia','$horario','Agendado','$tipo_paciente','$id_paciente','$dependente')";
}


mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");
echo $sql;

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "Cadastrado com sucesso";
    header("Location: formconsulta.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
