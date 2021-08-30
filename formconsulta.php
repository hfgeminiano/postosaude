<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<?php
require("logado.php");
require("cabecalho.php");

?>
<<<<<<< HEAD
=======



>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
<div class="registration-form">
    <form class="needs-validation" method="POST" action="consulta.php" novalidate>
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Agendar Consulta</h6>
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
<<<<<<< HEAD
                                <input type="date" class="form-control item" id="dia" name="dia" placeholder="Dia" disabled value="<?= date("Y-m-d"); ?>" required>
=======
                               
                                <input type="date" class="form-control item" id="dia" name="dia" placeholder="Dia" disabled value="<?= date("Y-m-d"); ?>">
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
<<<<<<< HEAD
                                <label for="textarea">Motivo do Atendimento</label>
                                <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Informe um Motivo.
                                </div>
=======
                            <label for="textarea">Motivo do Atendimento</label>
                            <textarea class="form-control" id="motivo" name="motivo" rows="3"></textarea>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
<<<<<<< HEAD
                                <select class="form-select" id="tipo" name="tipo" onchange="getPaciente(this.value, 0)" required>
                                    <option selected disabled value="">Tipo de Paciente</option>
=======
                                <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                                    <option selected disabled>Tipo de Paciente</option>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                                    <option value="0">Responsável</option>
                                    <option value="1">Dependente</option>
                                </select>
                                <div class="invalid-feedback">
                                    Selecione um Tipo de Paciente.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="images"></div>
                    <div class="row">
                        <div class="mb-2">
<<<<<<< HEAD
                            <select id="paciente" name="paciente" class="form-select" aria-label="Default select example" required>
                                <option selected disabled value="">Selecionar Paciente</option>
=======
                            <select id="paciente" name="paciente" class="form-select" aria-label="Default select example">
                                <option selected disabled="paciente">Selecionar Paciente</option>
                                <?php
                                require("conexao.php");
                                $id_paciente = $_SESSION['id'];
                                $sql = "SELECT dependentes.nome,dependentes.id FROM dependentes WHERE dependentes.usuario_id = $id_paciente";
                                $usuario = "SELECT usuario.nome,usuario.id FROM usuario WHERE usuario.id = $id_paciente";
                                $id_psf = "SELECT usuario.posto_id FROM usuario WHERE usuario.id = $id_paciente";


                                $executa = mysqli_query($conn, $usuario);
                                echo $id_paciente;
                                while ($linha = mysqli_fetch_array($executa)) {
                                    echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
                                }
                                $executa = mysqli_query($conn, $sql);
                                echo $id_paciente;
                                while ($linha = mysqli_fetch_array($executa)) {
                                    echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
                                }
                                ?>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
                            </select>
                            <div class="invalid-feedback">
                                Selecione o Paciente.
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Agendar">
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        function getPaciente(valor) {
            var tipo = $("#tipo").val();
            $("#paciente").html("<option value=''>Carregando Paciente...</option>");
            setTimeout(function() {
                $("#paciente").load("dependentes.php", {
                    tipo: valor
                })
            }, 1000)
        };
    </script>

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
</div>

<?php require("rodape.php"); ?>