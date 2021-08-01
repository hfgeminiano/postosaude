<div class="img">
    <img src="img/bg.png">
</div>
<div class="login-content">
    <form method="POST" action="valida.php">
        <h2 class="title">EasyPSF <br> Agendamentos</h2>
        <img src="img/avatar.png">
        <h2 class="title">Acesse sua Conta</h2>
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
        <div class="form-floating mb-3">
            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" name="senha" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Senha</label>
        </div>
        <div class="d-grid mb-3">
            <button class="btn btn-lg btn-primary" name="btnAcessar" value="acessar" type="submit">Acessar</button>
        </div>
        <div class="d-grid">
            <a href="cadusuario.php" class=" btn btn-lg btn-primary">Cadastrar</a>
        </div>


    </form>
</div>