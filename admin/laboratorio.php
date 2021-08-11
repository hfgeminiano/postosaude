<?php

require("logado.php");
$nome = $_POST['nome'];

include_once 'conexao.php';
$sql = "INSERT INTO laboratorio(nome) VALUES";
$sql .= "('$nome')";

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary'>Cadastrado com Sucesso!</div>";
    header("Location: formlab.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
