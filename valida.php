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
        $result_usuario = "SELECT id, nome, email, senha FROM usuarios WHERE email='$email'
        LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if ($resultado_usuario) {
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if (password_verify($senha, $row_usuario['senha'])) {
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['nome'] = $row_usuario['nome'];
                $_SESSION['email'] = $row_usuario['email'];
                header("Location: posto.php");
            } else {
                $_SESSION['msg'] = "Login e senha incorretos";
                header("Location: index.php");
            }
        }
    } else {
        $_SESSION['msg'] = "Login e senha incorretos";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: index.php");
}
