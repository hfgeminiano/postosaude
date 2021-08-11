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
                <div class="col-md-4 ">
                    <h3 class="text-center text-info">Adicionar Posto de Saúde</h3>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form method="POST" action="posto_.php" class="post">
                        <div class="form-group">
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome">
                        </div>
                        <div class="form-group mt-2">
                            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group mt-2">
                            <input type="tel" name="telefone" id="telefone" class="form-control" placeholder="Telefone">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="logradouro" id="logradouro" class="form-control" placeholder="Logradouro">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairro">
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" name="numero" id="numero" class="form-control" placeholder="Nº">
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-primary" name="add" value="add">Adicionar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-8">
                    <h3 class="text-center text-info">Postos Cadastrados</h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Telefone</th>
                                <th>Logradouro</th>
                                <th>Bairro</th>
                                <th>Nº</th>


                            </tr>
                        </thead>
                        <?php
                        include 'conexao.php';
                        $sql = "SELECT * FROM posto";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            while ($item = mysqli_fetch_assoc($result)) {
                                $id = $item['id'];
                                $nome = $item['nome'];
                                $email = $item['email'];
                                $telefone = $item['telefone'];
                                $logradouro = $item['logradouro'];
                                $bairro = $item['bairro'];
                                $numero = $item['numero'];
                                echo '<tr>
                        <td>' . $nome . '</td>
                        <td>' . $email . '</td>
                        <td>' . $telefone . '</td>
                        <td>' . $logradouro . '</td>
                        <td>' . $bairro . '</td>
                        <td>' . $numero . '</td>


                        <td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-id="' . $id . '" data-nome="' . $nome . '" data-email="' . $email . '" data-telefone="' . $telefone . '" data-logradouro="' . $logradouro . '" data-bairro="' . $bairro . '" data-numero="' . $numero . '">Editar</button>

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
                            <form method="POST" action="editar_posto.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nome" class="col-form-label">Nome:</label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">Telefone:</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">Logradouro:</label>
                                    <input type="text" class="form-control" id="logradouro" name="logradouro">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">Bairro:</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro">
                                </div>
                                <div class="form-group">
                                    <label for="crm" class="col-form-label">Nº:</label>
                                    <input type="text" class="form-control" id="numero" name="numero">
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
        var email = button.data('email')
        var telefone = button.data('telefone')
        var logradouro = button.data('logradouro')
        var bairro = button.data('bairro')
        var numero = button.data('numero')

        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Editar Posto: ' + nome)
        modal.find('#id').val(id)
        modal.find('#nome').val(nome)
        modal.find('#email').val(email)
        modal.find('#telefone').val(telefone)
        modal.find('#logradouro').val(logradouro)
        modal.find('#bairro').val(bairro)
        modal.find('#numero').val(numero)
    })
</script>

<?php

require("rodape.php");

?>