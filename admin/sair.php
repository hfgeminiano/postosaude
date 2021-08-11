<?php

session_start();

unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

$_SESSION['msg'] = "<div class='alert alert-primary'>Deslogado com Sucesso</div>";

header("Location: index.php");
