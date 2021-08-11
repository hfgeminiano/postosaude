<?php

require("logado.php");
?>
<header>
    <?php

    require("cabecalho.php");

    ?>
</header>
<div class="container-fluid mt-5">
    <div class="card justify-content-center">
        <div class="card-body shadow">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center text-info">Adicionar Médico</h3>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form method="POST" action="medico.php" class="post">
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="crm" id="crm" class="form-control" placeholder="CRM">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" name="add" value="add">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h3 class="text-center text-info">Médicos Cadastrados</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>CRM</th>
                            </tr>
                        </thead>
                        <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM medico";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($item = mysqli_fetch_assoc($result)) {
                                $id = $item['id'];
                                $nome = $item['nome'];
                                $crm = $item['crm'];
                                echo '<tr>
                        <td>' . $nome . '</td>
                        <td>' . $crm . '</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="' . $id . '" data-whatevernome="' . $nome . '" data-whatevercrm="' . $crm . '">Editar</button>
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
                            <form method="POST" action="editar_medico.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">Crm:</label>
                                    <input type="text" class="form-control" id="crm" name="crm">
                                </div>
                                <input type="hidden" id="id" name="id">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-warning">Alterar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        var recipientnome = button.data('whatevernome')
        var recipientcrm = button.data('whatevercrm')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Editar Médico: ' + recipientnome)
        modal.find('#id').val(recipient)
        modal.find('#nome').val(recipientnome)
        modal.find('#crm').val(recipientcrm)
    })
</script>

<?php

require("rodape.php");

?>