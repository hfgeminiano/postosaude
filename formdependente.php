<?php
require("cabecalho.php");
?>

<div class="registration-form">
    <form class="needs-validation" method="POST" action="dependente.php" novalidate>
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Cadastrar Dependente</h6>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    if (isset($_SESSION['msgcad'])) {
                        echo $_SESSION['msgcad'];
                        unset($_SESSION['msgcad']);
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome" required>
                                <div class="invalid-feedback">
                                    Informe o nome
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="date" class="form-control item" id="nascimento" name="nascimento" placeholder="Nascimento" required>
                                <div class="invalid-feedback">
                                    Informe a data de nascimento
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <input type="text" class="form-control item" id="identificacao" name="identificacao" placeholder="Doc. Identificação" required>
                                <div class="invalid-feedback">
                                    Informe o documento
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <select id="parentesco" name="parentesco" class="form-select" required>
                                    <option selected disabled value="">Grau de Parentesco</option>
                                    <option value="pai">Pai</option>
                                    <option value="mae">Mãe</option>
                                    <option value="pai">Cônjuge</option>
                                    <option value="filho">Filho(a)</option>
                                    <option value="irmao">Irmã(o)</option>
                                    <option value="sobrinho">Sobrinho(a)</option>
                                </select>
                                <div class="invalid-feedback">
                                    Informe o parentesco
                                </div>
                            </div>

                            <div class="form-group mb-2">
                                <select id="sexo" name="sexo" class="form-select" required>
                                    <option selected disabled value="">Sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                                <div class="invalid-feedback">
                                    Informe o sexo
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Cadastrar">
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