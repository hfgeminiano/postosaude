<?php

require("cabecalho.php");

?>

<div class="container">
    <h2 class="">Usuarios Cadastrados</h2>
    <table class="Table table-bordered table-hover">
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
        <?php
        require("conexao.php");
        $sql = "select * from usuarios";
        $executa = mysqli_query($conn, $sql);

        while ($linha = mysqli_fetch_array($executa)) {
            echo "<tr>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['telefone'] . "</td>";
            echo "<td>" . $linha['email'] . "</td>";
        }

        ?>

    </table>
</div>

<?php

require("rodape.php");

?>