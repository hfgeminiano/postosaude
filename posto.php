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


        <div class="accordion" id="accordionPanelsStayOpenExample">
             <div class="accordion-item">
                 <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        CONSULTAS
                     </button>
                 </h2>
                     <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                       <div class="accordion-body">


                       <div class="card-body">
            <div class="row justify-content-md-justify">
                <div class="col-sm-4">
                    <h2 class="">Consultas Pré Agendadas</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];                    
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,usuario.nome,posto.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id INNER JOIN posto ON consulta.posto_id = posto.id WHERE usuario.id = $id_paciente AND consulta.tipo_paciente = 0 AND consulta.estado = 'pre agendado'";
                    $executa = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item[3]; ?></h5>
                                        <p class="card-title">Dia: <?= date("Y-m-d"); ?></p>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <p class="card-text">Posto: <?php echo $item['nome']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,dependentes.nome,dependentes.id,posto.nome FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id INNER JOIN posto ON consulta.posto_id = posto.id WHERE dependentes.id = consulta.dependentes_id AND consulta.tipo_paciente = 1 AND dependentes.usuario_id = $id_paciente AND consulta.estado = 'pre agendado'";

                    $executa = mysqli_query($conn, $sql);
                    $coluna = 0;
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item[3]; ?></h5>
                                        <p class="card-title">Dia: <?= date("Y-m-d"); ?></p>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <p class="card-text">Posto: <?php echo $item['nome']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Consultas Agendadas</h2>

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
                    $sql = "SELECT consulta.id,consulta.dia,consulta.estado,dependentes.nome,dependentes.id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id WHERE dependentes.id = consulta.dependentes_id AND consulta.tipo_paciente = 1 AND dependentes.usuario_id = $id_paciente AND consulta.estado = 'agendado'";

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
  </div>
    
     <div class="accordion-item">
                 <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                 <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        EXAMES
                     </button>
                 </h2>
                 <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                       <div class="accordion-body">

                       <div class="card-body">
            <div class="row justify-content-md-justify">
                <div class="col-sm-4">
                    <h2 class="">Exames Pré Agendados</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];                    
                    $sql = "SELECT exame.id,exame.dia,exame.tipo,exame.estado,usuario.nome,posto.nome,laboratorio.nome FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN posto ON exame.posto_id = posto.id INNER JOIN laboratorio on exame.laboratorio_id = laboratorio.id WHERE usuario.id = $id_paciente AND exame.estado = 'pre agendado'";
                    $executa = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item[4]; ?></h5>
                                        <p class="card-title text-dark">Tipo de Exame: <?php echo $item['tipo']; ?></p>
                                        <p class="card-title">Data do pré agendamento: <?= date("Y-m-d"); ?></p>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <p class="card-text">Laboratório: <?php echo $item['nome']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                   ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Exames Agendados</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT exame.id,exame.dia,exame.tipo,exame.estado,usuario.nome,posto.nome,laboratorio.nome FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN posto ON exame.posto_id = posto.id INNER JOIN laboratorio on exame.laboratorio_id = laboratorio.id WHERE usuario.id = $id_paciente AND exame.estado = 'agendado'";
                    $executa = mysqli_query($conn, $sql);
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Paciente: <?php echo $item[4]; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                     ?>
                </div>
                <div class="col-sm-4">
                    <h2 class="">Exames Realizados</h2>

                    <?php
                    require("conexao.php");
                    $id_paciente = $_SESSION['id'];
                    $sql = "SELECT exame.id,exame.dia,exame.tipo,exame.estado,usuario.nome,posto.nome,laboratorio.nome FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN posto ON exame.posto_id = posto.id INNER JOIN laboratorio on exame.laboratorio_id = laboratorio.id WHERE usuario.id = $id_paciente AND exame.estado = 'atendido'";

                    $executa = mysqli_query($conn, $sql);
                    $coluna = 0;
                    while ($item = mysqli_fetch_array($executa)) {
                    ?>
                        <div class="row">
                            <div class="col mb-5">
                                <div class="card">
                                    <div class="card-body">
                                    <h5 class="card-title">Paciente: <?php echo $item[4]; ?></h5>
                                        <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                        <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                        <a href="#" class="btn btn-Danger">Cancelar</a>
                                        <a href="detalhes_exame.php?id_exame=<?php echo $item['id']; ?>" class="btn btn-primary">Detalhes</a>
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
        </div>


       
      
    </div>
  </div>        
</div>


<?php

require("rodape.php");

?>