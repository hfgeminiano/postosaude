<?php

require("logado.php");

require("cabecalho.php");

?>

<div class="registration-form">
    <form method="POST" action="exame.php">
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
                                <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                                    <option selected disabled>Tipo de Exame</option>
                                    <option value="Sangue">Sangue</option>
                                    <option value="Urina">Urina</option>
                                    <option value="Hemograma">Hemograma</option>
                                    <option value="Colesterol">Colesterol</option>
                                    <option value="Fezes">Fezes</option>
                                    <option value="Ureia">Ureia e Creatina</option>
                                    <option value="Eletrocardiograma">Eletrocardiograma</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="information mt-4">Escolha o Laboratório</h6>

                        <div class="mb-2">
                            <select id="laboratorio" name="laboratorio" class="form-select" aria-label="Default select example">
                                <option selected disabled="paciente">Selecionar Laboratório</option>
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
                        </div>
                    </div>

                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Agendar">
                </div>
            </div>
        </div>
    </form>
</div>

<?php require("rodape.php"); ?>