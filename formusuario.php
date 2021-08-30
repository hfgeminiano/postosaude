<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<?php
session_start();
ob_start();
$btnCadastrar = filter_input(INPUT_POST, 'btnCadastrar', FILTER_SANITIZE_STRING);
if ($btnCadastrar) {
    include_once 'conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $erro = false;

    $dados_st = array_map('strip_tags', $dados_rc);
    $dados = array_map('trim', $dados_rc);

    if (in_array('', $dados)) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>Preencha todos os campos</div>";
    } elseif ((strlen($dados['senha'])) < 6) {

        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>A senha deve ter no mínimo 6 caracteres</div>";
    } elseif (stristr($dados['senha'], "'")) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger'>Caracter ( ' ) utilizado na senha é inválido</div>";
    } else {

        $result_usuario = "SELECT id FROM usuarios WHERE email='" . $dados['email'] . "'";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if (($resultado_usuario) and ($resultado_usuario->num_rows != 0)) {
            $erro = true;
            $_SESSION['msg'] = "<div class='alert alert-danger'>Este e-mail já está cadastrado</div>";
        }
    }

    if (!$erro) {

        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $result_usuario = "INSERT INTO usuario(nome, email, senha, telefone, sexo, nascimento,nivel,cpf,posto_id,logradouro,bairro,numero) VALUES (
        '" . $dados['nome'] . "',
        '" . $dados['email'] . "',
        '" . $dados['senha'] . "',
        '" . $dados['telefone'] . "',
        '" . $dados['sexo'] . "',
        '" . $dados['nascimento'] . "',
        '" . 0 . "',
        '" . $dados['cpf'] . "',
        '" . $dados['posto'] . "',
        '" . $dados['logradouro'] . "',
        '" . $dados['bairro'] . "',
        '" . $dados['numero'] . "'
        )";
        $result_usuario = mysqli_query($conn, $result_usuario);
        if (mysqli_insert_id($conn)) {
            $_SESSION['msgcad'] = "<div class='alert alert-primary'>Cadastrado com Sucesso!</div>";
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "Erro ao cadastrar";
        }
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
            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control item" id="email" name="email" placeholder="email@email.com">
        </div>
        <div class=" mb-1">
            <input type="password" class="form-control item" id="senha" name="senha" placeholder="Senha">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" name="telefone" id="telefone" placeholder="Telefone ou Celular">
            <script>
                
        jQuery("#telefone")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });

        $(document).ready(function(){
		$("#cpf").mask("999.999.999-99");
        });
        
            </script>
        </div>
        <div class="mb-1">
            <select id="sexo" name="sexo" class="form-select" aria-label="Default select example">
                <option selected disabled="Sexo">Sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>

            </select>
        </div>
        <div class="mb-1">
            <input type="date" maxlength="10" pattern="[0-9]{2}\/[0-9]{2}\/[0-9]{4}$" class="form-control item" id="nascimento" name="nascimento" placeholder="Data de Nascimento">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" name="cpf" id="cpf" placeholder="CPF">
        </div>
        <div class="mb-1">
            <select id="posto" name="posto" class="form-select" aria-label="Default select example">
                <option selected disabled="">Selecione o PSF</option>
                <?php
                require("conexao.php");
                $id_paciente = $_SESSION['id'];
                $sql = "SELECT posto.id,posto.nome FROM posto";
                $executa = mysqli_query($conn, $sql);
                echo $id_paciente;
                while ($linha = mysqli_fetch_array($executa)) {
                    echo "<option value=" . $linha['id'] . ">" . $linha['nome'] . "</option>";
                }
                ?>
            </select>

        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" name="logradouro" id="logradouro" placeholder="Logradouro">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" name="bairro" id="bairro" placeholder="Bairro">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control item" name="numero" id="numero" placeholder="Nº">
        </div>
        <div class="d-grid">
            <input type="submit" name="btnCadastrar" class="btn btn-lg btn-primary" value="Cadastrar" type="submit">
        </div>
    </form>
</div>