<?php
session_start();
if (!empty($_SESSION['nome'])) {
} else {
    $_SESSION['msg'] = "Area restrita";
    header("Location: index.php");
}
