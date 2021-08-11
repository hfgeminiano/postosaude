<?php

require("logado.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$logradouro = $_POST['logradouro'];
$bairro = $_POST['bairro'];
$numero = $_POST['numero'];

include_once 'conexao.php';
$sql = "INSERT INTO posto(nome,logradouro,email,telefone,bairro,numero) VALUES ";
$sql .= "('$nome','$logradouro','$email','$telefone','$bairro','$numero')";

mysqli_query($conn, $sql) or die("Erro ao tentar cadastrar registro");

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Cadastrado com Sucesso!</div>";
    header("Location: formpsf.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
