<<<<<<< HEAD
<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$obs = mysqli_real_escape_string($conn, $_POST['obs']);
$estado = mysqli_real_escape_string($conn, 'Atendido');

$result_consulta = "UPDATE exame SET estado='$estado',observacao='$obs' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Exame realizado com  Sucesso!</div>";
    header("Location: examesagen.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
=======
<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$obs = mysqli_real_escape_string($conn, $_POST['obs']);
$estado = mysqli_real_escape_string($conn, 'Atendido');

$result_consulta = "UPDATE exame SET estado='$estado',observacao='$obs' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Exame realizado com  Sucesso!</div>";
    header("Location: posto.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
