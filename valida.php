<?php
session_start();
include_once("conexao.php");
$btnAcessar = filter_input(INPUT_POST, 'btnAcessar', FILTER_SANITIZE_STRING);
if ($btnAcessar) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
    //echo "$email";

    if ((!empty($email)) and (!empty($senha))) {

        //echo password_hash($senha, PASSWORD_DEFAULT);
        $result_usuario = "SELECT id, nome, email, senha,posto_id,nivel FROM usuario WHERE email='$email' AND nivel=0 LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if ($resultado_usuario) {
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if (password_verify($senha, $row_usuario['senha'])) {
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['email'] = $row_usuario['email'];
                $_SESSION['posto_id'] = $row_usuario['posto_id'];
                $_SESSION['nivel'] = $row_usuario['nivel'];
                header("Location: posto.php");
            } else {
                $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
                header("Location: index.php");
            }
        }
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger'>Login ou senha incorreto!</div>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Página não encontrada</div>";
    header("Location: index.php");
}
