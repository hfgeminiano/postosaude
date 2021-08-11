<?php
require("logado.php");
require("cabecalho.php");

?>

<div class="registration-form">
    <form method="POST" action="consulta.php">
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Agendar Consulta</h6>
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
                            <div class="form-group">
                                <input type="date" class="form-control item" id="dia" name="dia" placeholder="Dia">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control item" id="motivo" name="motivo" placeholder="Motivo">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <select class="form-select" id="tipo" name="tipo" aria-label="Default select example">
                                    <option selected disabled>Tipo de Paciente</option>
                                    <option value="0">Responsável</option>
                                    <option value="1">Dependente</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-1">
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
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Cadastrar">
                </div>
            </div>
        </div>
    </form>
</div>

<?php require("rodape.php"); ?>