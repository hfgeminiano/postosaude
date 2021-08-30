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
            <h3 class="text-center text-info">Exames Pré Agendados</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Laboratório</th>
                        <th>Dia</th>
                        <th>Aprovar</th>
                    </tr>
                </thead>
                <?php
                include 'conexao.php';
                $id_posto = $_SESSION['posto_id'];
                $sql = "SELECT exame.id,exame.dia,exame.tipo,usuario.nome,laboratorio.nome as lab FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN laboratorio ON exame.laboratorio_id = laboratorio.id WHERE exame.posto_id = $id_posto AND exame.estado = 'pre agendado'";

                $result = mysqli_query($conn, $sql);
                if ($result) {
                    while ($item = mysqli_fetch_array($result)) {

                        $id = $item['id'];
                        $dia = date("Y-m-d");
                        $tipo = $item['tipo'];
                        $nome = $item['nome'];
                        $lab =  $item['lab'];



                        echo '<tr>
                        <td>' . $id . '</td>
                        <td>' . $nome . '</td>
                        <td>' . $tipo . '</td>
                        <td>' . $lab . '</td>
                        <td>' . $dia . '</td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $id . '" data-whatevernome="' . $nome . '"  data-whateverdia="' . $dia . '">Aprovar</button>
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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Médico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="aprovar_exame.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="dia" class="col-form-label">Dia:</label>
                        <input type="date" class="form-control" id="dia" name="dia">
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
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
        var recipientdia = button.data('whateverdia')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Aprovar Exame:  ' + recipientnome)
        modal.find('#id').val(recipient)
        modal.find('#nome').val(recipientnome)
        modal.find('#dia').val(recipientdia)
    })
</script>