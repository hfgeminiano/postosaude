<?php
require("logado.php");
require("cabecalho.php");

?>
<div class="registration-form">
    <form class="needs-validation" method="POST" action="assistencia.php" novalidate>
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Agendar Assistência</h6>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <h6 class="information mt-4">Escolha o dia</h6>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
                                <input type="date" class="form-control item" id="dia" name="dia" placeholder="Dia" disabled value="<?= date("Y-m-d"); ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
                                <label for="textarea">Motivo do Atendimento</label>
                                <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Informe um Motivo.
                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Agendar">
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>
<?php require("rodape.php"); ?>