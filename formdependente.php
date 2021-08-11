<?php
require("cabecalho.php");
?>

<div class="registration-form">
    <form method="POST" action="dependente.php">
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
                                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group mb-2">
                                <input type="date" class="form-control item" id="nascimento" name="nascimento" placeholder="Nascimento">
                            </div>
                            <div class="form-group mb-2">
                                <select id="sexo" name="sexo" class="form-select" aria-label="Default select example">
                                    <option selected disabled="Sexo">Sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="btnCadastrar" class="btn btn-block create-account btn-primary" value="Cadastrar">
                </div>
            </div>
        </div>
    </form>
</div>

<?php require("rodape.php"); ?>