<?php

require("logado.php");

?>
<header>
    <?php

    require("cabecalho.php");

    ?>
</header>
<div class="container mt-4 ">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-md-justify">
                <div class="col-sm-4">
                    <h2 class="">Consultas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.dia,consulta.horario,consulta.estado,usuarios.nome FROM consulta INNER JOIN usuarios ON consulta.id_usuario = usuarios.id WHERE usuarios.id = $id_paciente AND consulta.tipo_paciente = 'responsavel'";
                    $executa = mysqli_query($conn, $sql);
                    $coluna = 0;
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Hora: <?php echo $item['horario']; ?></p>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-primary">Detalhes</a>
                                        <a href="#" class="btn btn-Warning">Modificar</a>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Exames</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.dia,consulta.horario,consulta.estado,usuarios.nome FROM consulta INNER JOIN usuarios ON consulta.id_usuario = usuarios.id WHERE usuarios.id = $id_paciente";
                    $executa = mysqli_query($conn, $sql);
                    $coluna = 0;
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">

                            </div>
                        </div>


                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Consultas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.dia,consulta.horario,consulta.estado,dependentes.nome FROM consulta INNER JOIN dependentes ON consulta.id_dependente = dependentes.id WHERE dependentes.id_usuario = $id_paciente";
                    $executa = mysqli_query($conn, $sql);
                    $coluna = 0;
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Hora: <?php echo $item['horario']; ?></p>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-primary">Detalhes</a>
                                        <a href="#" class="btn btn-Warning">Modificar</a>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require("rodape.php");

?>