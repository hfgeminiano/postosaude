<?php
require("cabecalho.php");
?>

<div class="registration-form">
    <form method="POST" action="dependente.php">
        <div class="container mt-5 mb-5 justify-content-center">
            <div class="card px-12 py-16">
                <div class="card-body">
                    <h6 class="card-title mb-3 text-center">Cadastrar Dependente</h6>
                    <div class="alert alert-primary" role="alert">
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
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group mb-2">
                                <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control item" id="nascimento" name="nascimento" placeholder="Nascimento">
                            </div>
                            <div class="form-group mb-2">
                                <input type="text" class="form-control item" id="sexo" name="sexo" placeholder="Sexo">
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