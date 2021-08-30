<?php
require("logado.php");


$id_consulta = filter_input(INPUT_GET, "id_consulta", FILTER_SANITIZE_NUMBER_INT);
$id_paciente = $_SESSION['id'];



if (empty($id_consulta)) {
    $_SESSION['msg'] = "<div class='alert alert-danger'>Erro: Usuário não encontrado!</div>";
    header("Location: posto.php");
    exit();
}
?>

<?php

require("cabecalho.php");

?>


<div class="container mt-4" id="corpo">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-md-justify">

                <div class="col-sm-4">
                    <h3 class="">Consulta #<?php echo $id_consulta ?></h2>
                        <hr>
                        <?php
                        require("conexao.php");
                        $id_paciente = $_SESSION['id'];
                        $sql = "SELECT consulta.id,consulta.dia,consulta.horario,consulta.estado,consulta.medico_id,consulta.observacao,usuario.nome,medico.nome as nome2 FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id INNER JOIN medico ON consulta.medico_id = medico.id WHERE usuario.id = $id_paciente AND consulta.tipo_paciente = 0 AND consulta.id = $id_consulta";
                        $executa = mysqli_query($conn, $sql);
                        while ($item = mysqli_fetch_array($executa)) {
                        ?>
                            <div class="row-sm-4">
                                <div class="col mb-5">
                                    <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                    <hr>
                                    <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                    <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                    <p class="card-text">Médico: <?php echo $item['nome2']; ?></p>
                                    <p class="card-text">Observação: <?php echo $item['observacao']; ?></p>
                                    <button type="button" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
                                    <button type="button" id="geraPDF" class="btn btn-success">Baixar Relatório</button>
                                </div>
                            </div>
                        <?php } ?>
                        <?php
                        require("conexao.php");
                        $id_paciente = $_SESSION['id'];
                        $sql = "SELECT consulta.id,consulta.dia,consulta.horario,consulta.estado,consulta.medico_id,consulta.observacao,dependentes.nome as nome_dependente,medico.nome as nome_medico,consulta.usuario_id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id INNER JOIN medico ON consulta.medico_id = medico.id WHERE consulta.usuario_id = $id_paciente AND consulta.tipo_paciente = 1 AND consulta.id = $id_consulta";
                        $executa = mysqli_query($conn, $sql);
                        while ($item = mysqli_fetch_array($executa)) {
                        ?>
                            <div class="row">
                                <div class="col mb-5">
                                    <h5 class="card-title">Paciente: <?php echo $item['nome_dependente']; ?></h5>
                                    <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                    <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                    <p class="card-text">Médico: <?php echo $item['nome_medico']; ?></p>
                                    <p class="card-text">Observação: <?php echo $item['observacao']; ?></p>
                                    <button type="button" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
                                    <button type="button" id="btnPrint" class="btn btn-success">Baixar Relatório</button>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="editor"></div>

<script type="text/javascript">
    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function(element, renderer) {
            return true;
        }
    };

    $('#geraPDF').click(function() {
        doc.fromHTML($('#corpo').html(), 15, 15, {
            'width': 270,
            'elementHandlers': specialElementHandlers
        });
        doc.save('consulta_<?php echo $id_consulta ?>.pdf');
    });
</script>


<?php require("rodape.php"); ?>