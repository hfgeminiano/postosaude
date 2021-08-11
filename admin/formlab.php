<?php

require("logado.php");
?>
<header>
    <?php

    require("cabecalho.php");

    ?>
</header>
<div class="container-fluid">
    <div class="card shadow mt-5">
        <div class="card-body">


            <div class="row mt-3">
                <div class="col-md-4">
                    <h3 class="text-center text-info">Adicionar laboratório</h3>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form method="POST" action="laboratorio.php" class="post">
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" name="add" value="add">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h3 class="text-center text-info">laboratórios Cadastrados</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                            </tr>
                        </thead>
                        <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM laboratorio";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($item = mysqli_fetch_assoc($result)) {
                                $id = $item['id'];
                                $nome = $item['nome'];
                                echo '<tr>
                        <td>' . $nome . '</td>


                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="' . $id . '" data-nome="' . $nome . '">Editar</button>

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
                            <h5 class="modal-title" id="exampleModalLabel">Posto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="editar_laboratorio.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
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
        var id = button.data('id') // Extract info from data-* attributes
        var nome = button.data('nome')


        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Editar Laboratório: ' + nome)
        modal.find('#id').val(id)
        modal.find('#nome').val(nome)
    })
</script>

<?php

require("rodape.php");

?>