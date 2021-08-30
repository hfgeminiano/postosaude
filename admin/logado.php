<?php
session_start();

if ($_SESSION['nivel'] != 1) {
    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

    $_SESSION['msg'] = "<div class='alert alert-danger'>Acesso Restrito!</div>";
}


if (!empty($_SESSION['nome'])) {
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Area Restrita</div>";
    header("Location: index.php");
}
