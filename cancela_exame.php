<?php
require("logado.php");
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_consulta = "DELETE FROM exame WHERE id='$id'";
$resultado_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Exame Cancelado com Sucesso!</div>";
    header("Location: posto.php");
} else {
    $_SESSION['msg'] = "Erro ao cancelar";
}
