<?php
require("logado.php");
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$id_paciente = $_SESSION['id'];
$tipo_paciente = $_POST['tipo'];
$sql = "SELECT dependentes.nome,dependentes.id FROM dependentes WHERE dependentes.usuario_id = $id_paciente";
$usuario = "SELECT usuario.nome,usuario.id FROM usuario WHERE usuario.id = $id_paciente";
$id_psf = "SELECT usuario.posto_id FROM usuario WHERE usuario.id = $id_paciente";


if ($tipo_paciente == 0) {
    $executa1 = mysqli_query($conn, $usuario);
    echo 'usuario';
    while ($linha = mysqli_fetch_array($executa1)) {
        echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
    }
} else {
    $executa2 = mysqli_query($conn, $sql);
    echo 'dependente';
    while ($linha = mysqli_fetch_array($executa2)) {
        echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
    }
}
