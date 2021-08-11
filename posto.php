<?php

require("logado.php");

?>
<header>
    <?php

    require("cabecalho.php");

    ?>
</header>
<div class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-md-justify">
                <div class="col-sm-4">
                    <h2 class="">Pre Agendadas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,usuario.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id WHERE usuario.id = $id_paciente AND consulta.tipo_paciente = 0 AND consulta.estado = 'pre agendado'";
                    $executa = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,dependentes.nome,dependentes.id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id WHERE dependentes.id = consulta.dependentes_id AND consulta.tipo_paciente = 1 AND dependentes.usuario_id = 6 AND consulta.estado = 'pre agendado'";

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
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Agendadas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,usuario.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id WHERE usuario.id = $id_paciente AND consulta.tipo_paciente = 0 AND consulta.estado = 'agendado'";
                    $executa = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,dependentes.nome,dependentes.id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id WHERE dependentes.id = consulta.dependentes_id AND consulta.tipo_paciente = 1 AND dependentes.usuario_id = 6 AND consulta.estado = 'agendado'";

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
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Consultas Realizadas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT consulta.id,consulta.dia,consulta.id,consulta.horario,consulta.estado,usuario.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id WHERE usuario.id = $id_paciente AND consulta.estado = 'atendido' AND consulta.tipo_paciente = 0";

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
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="detalhes_consulta.php?id_consulta=<?php echo $item['id']; ?>" class="btn btn-primary">Detalhes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sql = "SELECT consulta.id as id_consulta,consulta.dia,consulta.estado,dependentes.nome,dependentes.id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id WHERE dependentes.id = consulta.dependentes_id AND consulta.tipo_paciente = 1 AND dependentes.usuario_id = $id_paciente AND consulta.estado = 'atendido'";

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
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="detalhes_consulta.php?id_consulta=<?php echo $item['id_consulta']; ?>" class="btn btn-primary">Detalhes</a>
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