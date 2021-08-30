<?php
session_start();
if ($_SESSION['nivel'] != 0) {
    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

    $_SESSION['msg'] = "<div class='alert alert-primary'>Deslogado com Sucesso</div>";
    header("Location: index.php");
}

if (!empty($_SESSION['nome'])) {
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Área Restrita</div>";
    header("Location: index.php");
}
