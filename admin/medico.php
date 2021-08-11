<?php

require("logado.php");

$nome = $_POST['nome'];
$crm = $_POST['crm'];
include_once 'conexao.php';
$sql = "INSERT INTO medico(nome,crm) VALUES ";
$sql .= "('$nome','$crm')";

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Cadastrado com Sucesso!</div>";
    header("Location: formmedicos.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
