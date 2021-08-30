<?php

require("logado.php");
?>
<header>
    <?php

    require("cabecalho.php");

    ?>
</header>
<div class="row">
    <div class="container mt-5">
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div class="col-md-16">
            <h3 class="text-center text-info">Consultas Agendadas</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Motivo</th>
                        <th>Dia</th>
                        <th>Atender</th>
                    </tr>
                </thead>
                <?php
                include 'conexao.php';
                $id_posto = $_SESSION['posto_id'];
                $sql = "SELECT consulta.dia,consulta.id,consulta.estado,consulta.motivo,consulta.medico_id,consulta.observacao, usuario.nome,consulta.usuario_id FROM consulta INNER JOIN usuario ON consulta.usuario_id WHERE consulta.estado = 'agendado' AND consulta.usuario_id = usuario.id AND consulta.posto_id = $id_posto AND consulta.tipo_paciente = 0";
                $sql2 = "SELECT consulta.dia,consulta.id,consulta.estado,consulta.motivo,consulta.medico_id,consulta.observacao,dependentes.nome,dependentes.id as dep_id FROM consulta INNER JOIN dependentes ON consulta.dependentes_id = dependentes.id WHERE consulta.estado = 'agendado' AND consulta.dependentes_id = dependentes.id AND consulta.posto_id = $id_posto AND consulta.tipo_paciente = 1";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($item = mysqli_fetch_assoc($result)) {
                        $id = $item['id'];
                        $dia = $item['dia'];
                        $motivo = $item['motivo'];
                        $nome = $item['nome'];
                        $medico = $item['medico_id'];
                        $obs = $item['observacao'];
                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $nome . '</td>
                        <td>' . $motivo . '</td>
                        <td>' . $dia . '</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $id . '" data-whatevernome="' . $nome . '" data-whateverobs="' . $obs . '" data-whatevermedico="' . $medico . '">Atender</button>
                        </td>
                    </tr>';
                    }
                }
                $result2 = mysqli_query($conn, $sql2);
                if ($result2) {
                    while ($item = mysqli_fetch_assoc($result2)) {
                        $id = $item['id'];
                        $dia = $item['dia'];
                        $motivo = $item['motivo'];
                        $nome = $item['nome'];
                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $nome . '</td>
                        <td>' . $motivo . '</td>
                        <td>' . $dia . '</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $id . '" data-whatevernome="' . $nome . '" data-whateverdia="' . $dia . '">Atender</button>
                        </td>
                    </tr>';
                    }
                }
                ?>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade needs-validations" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="atender.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nome" class="col-form-label">Médico:</label>
                        <select id="medico" name="medico" class="form-select" aria-label="Default select example" required>
                            <option selected disabled value="">Selecione o Médico</option>
                            <?php
                            require("conexao.php");
                            $id_paciente = $_SESSION['id'];
                            $sql = "SELECT medico.id,medico.nome FROM medico";
                            $executa = mysqli_query($conn, $sql);
                            while ($linha = mysqli_fetch_array($executa)) {
                                echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nome" class="col-form-label">Observação:</label>
                        <textarea type="text" class="form-control" id="obs" name="obs" required></textarea>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php

require("rodape.php");

?>

<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        var recipientobs = button.data('whateverobs')
        var recipientmedico = button.data('whatevermedico')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Aprovar Consulta:  ' + recipientnome)
        modal.find('#id').val(recipient)
        modal.find('#medico').val(recipientmedico)
        modal.find('#obs').val(recipientobs)
    })
</script>