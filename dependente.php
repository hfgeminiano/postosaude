<?php

require("logado.php");

$nome = $_POST['nome'];
$nascimento = $_POST['nascimento'];
$sexo = $_POST['sexo'];
$id_usuario = $_SESSION['id'];
include_once 'conexao.php';
$sql = "INSERT INTO dependentes(nome,nascimento,sexo,id_usuario) VALUES ";
$sql .= "('$nome','$nascimento','$sexo','$id_usuario')";

echo $nome, $nascimento, $sexo, $id_usuario, $sql;

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "Cadastrado com sucesso";
    header("Location: formdependente.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
