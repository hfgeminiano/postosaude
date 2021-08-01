<!DOCTYPE html>
<html>

<head>
    <title>Sistema para Agendamento de Consultas</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
        <?php

        require("cabecalho_home.php");

        ?>
    </header>
    <img class="wave" src="img/wave.png">

    <div class="container">
        <?php

        require("formusuario.php");

        ?>
    </div>
    <footer>
        <?php

        require("rodape.php");

        ?>
    </footer>
</body>

</html>