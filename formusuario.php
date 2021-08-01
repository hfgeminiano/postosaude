<?php
session_start();
ob_start();
$btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar) {
    include_once 'conexao.php';
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
    $result_usuario = "INSERT INTO usuarios(nome, email, senha, telefone, sexo, nascimento) VALUES (
        '" . $dados['nome'] . "',
        '" . $dados['email'] . "',
        '" . $dados['senha'] . "',
        '" . $dados['telefone'] . "',
        '" . $dados['sexo'] . "',
        '" . $dados['nascimento'] . "'
        )";
    $result_usuario = mysqli_query($conn, $result_usuario);
    if (mysqli_insert_id($conn)) {
        $_SESSION['msgcad'] = "Cadastrado com sucesso";
        header("Location: index.php");
    } else {
        $_SESSION['msg'] = "Erro ao cadastrar";
    }
}
?>
<div class="img">
    <img src="img/bg.png">
</div>

<div class="login-content">
    <form method="POST" action="">

        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <h2 class="title">Formulário de Cadastro</h2>
        <img src="img/cad.png">
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
        </div>

        <div class="mb-1 mt-3">
            <input type="text" class="form-control item" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" id="email" name="email" placeholder="Email">
        </div>
        <div class=" mb-1">
            <input type="password" class="form-control item" id="senha" name="senha" placeholder="Senha">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" id="telefone" name="telefone" placeholder="Telefone">
        </div>
        <div class="mb-1">
            <select id="sexo" name="sexo" class="form-select" aria-label="Default select example">
                <option selected disabled="Sexo">Sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>

            </select>
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" id="nascimento" name="nascimento" placeholder="Data de Nascimento">
        </div>
        <div class="d-grid">
            <input type="submit" name="btnCadastrar" class="btn btn-lg btn-primary" name="btnCadastrar" value="Cadastrar" type="submit">
        </div>
    </form>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js" type="text/javascript"></script>