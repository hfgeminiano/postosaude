<?php
session_start();
if (!empty($_SESSION['nome'])) {
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Area Restrita</div>";
    header("Location: index.php");
}
