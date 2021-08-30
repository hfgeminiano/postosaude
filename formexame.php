<?php

require("logado.php");

require("cabecalho.php");

?>

<div class="registration-form">
    <form class="needs-validation" method="POST" action="exame.php" novalidate>
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Agendar Exame</h6>
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
                    <h6 class="information mt-4">Escolha o dia</h6>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
<<<<<<< HEAD
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <option selected disabled value="">Tipo de Exame</option>
=======
                                <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                                    <option selected disabled>Tipo de Exame</option>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                                    <option value="Sangue">Sangue</option>
                                    <option value="Urina">Urina</option>
                                    <option value="Hemograma">Hemograma</option>
                                    <option value="Colesterol">Colesterol</option>
                                    <option value="Fezes">Fezes</option>
                                    <option value="Ureia">Ureia e Creatina</option>
                                    <option value="Eletrocardiograma">Eletrocardiograma</option>
<<<<<<< HEAD
=======
                                    
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um tipo de exame!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="information mt-4">Escolha o Laboratório</h6>

                        <div class="mb-2">
<<<<<<< HEAD
                            <select id="laboratorio" name="laboratorio" class="form-select" required>
                                <option selected disabled value="">Selecionar Laboratório</option>
=======
                            <select id="laboratorio" name="laboratorio" class="form-select" aria-label="Default select example">
                                <option selected disabled="paciente">Selecionar Laboratório</option>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                                <?php
                                require("conexao.php");
                                $id_paciente = $_SESSION['id'];
                                $sql = "SELECT laboratorio.id, laboratorio.nome as lab FROM laboratorio";

                                $executa = mysqli_query($conn, $sql);
                                echo $id_paciente;
                                while ($linha = mysqli_fetch_array($executa)) {
                                    echo "<option value=" . $linha['id'] . ">" . $linha['lab'] . "</option>";
                                }
                                ?>
                            </select>
                            <div class="invalid-feedback">
                                Selecione o laboratório de preferência!
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