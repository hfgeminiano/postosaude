<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);

$result_lab = "UPDATE laboratorio SET nome='$nome' WHERE id = '$id'";
$resultado_lab = mysqli_query($conn, $result_lab) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary'>Alterado com Sucesso!</div>";
    header("Location: formlab.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
