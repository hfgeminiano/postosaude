<?php
require("logado.php");


$id_exame = filter_input(INPUT_GET, "id_exame", FILTER_SANITIZE_NUMBER_INT);
$id_paciente = $_SESSION['id'];

if (empty($id_exame)) {
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

                <div class="col-sm-12">
                    <h3 class="">Exame #<?php echo $id_exame ?></h2>
                        <hr>
                        <?php
                        require("conexao.php");
                        $id_paciente = $_SESSION['id'];
                        $sql = "SELECT exame.id,exame.dia,exame.tipo,exame.estado,exame.observacao,usuario.nome,posto.nome as nomePosto, laboratorio.nome as nomeLab FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN posto ON exame.posto_id = posto.id INNER JOIN laboratorio ON exame.laboratorio_id = laboratorio.id WHERE usuario.id = $id_paciente AND exame.id = $id_exame";
                        $executa = mysqli_query($conn, $sql);
                        $coluna = 0;
                        while ($item = mysqli_fetch_array($executa)) {
                        ?>
                            <div class="row-sm-4">
                                <div class="col mb-5">
                                    <h5 class="card-title">Paciente: <?php echo $item['nome']; ?></h5>
                                    <hr>
                                    <p class="card-title">Dia: <?php echo $item['dia']; ?></hp>
                                    <p class="card-title">Tipo de Exame: <?php echo $item['tipo']; ?></hp>
                                    <p class="card-text">Estado: <?php echo $item['estado']; ?></p>
                                    <p class="card-text">Posto de Saúde: <?php echo $item['nomePosto']; ?></p>
                                    <p class="card-text">Laboratório: <?php echo $item['nomeLab']; ?></p>
                                    <p class="card-text">Observação: <?php echo $item['observacao']; ?></p>
                                    <button type="button" class="btn btn-primary" onClick="history.go(-1)">Voltar</button>
                                    <button type="button" id="geraPDF" class="btn btn-success">Baixar Relatório</button>

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
        doc.save('exame_<?php echo $id_exame ?>.pdf');
    });
</script>

<?php require("rodape.php"); ?>