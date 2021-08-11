<?php

require("logado.php");
?>
<header>
    <?php

    require("cabecalho.php");
    $id_posto = $_SESSION['posto_id'];
    $nome = $_SESSION['nome']
    ?>
</header>


<!-- Main Content -->
<div id="container-fluid">
    <div class="card">
        <div class="card-body">
            <!-- Begin Page Content -->
            <div class="card shadow mt-2 mb-2">
                <div class="card-body">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $nome ?>
                            <hr> PSF
                            <?php
                            include 'conexao.php';
                            $sql = "SELECT nome FROM posto WHERE id = $id_posto";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                while ($item = mysqli_fetch_assoc($result)) {
                                    echo $item['nome'];
                                }
                            }

                            ?>
                        </h1>
                    </div>

                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                EXAMES PRE AGENDADOS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'pre agendado' AND consulta.posto_id = $id_posto";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($item = mysqli_fetch_assoc($result)) {
                                                        echo $item['COUNT(*)'];
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                EXAMES AGENDADOS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'pre agendado' AND consulta.posto_id = $id_posto";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($item = mysqli_fetch_assoc($result)) {
                                                        echo $item['COUNT(*)'];
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                EXAMES REALIZADOS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'pre agendado' AND consulta.posto_id = $id_posto";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($item = mysqli_fetch_assoc($result)) {
                                                        echo $item['COUNT(*)'];
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                CONSULTAS PRE AGENDADAS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'pre agendado' AND consulta.posto_id = $id_posto";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($item = mysqli_fetch_assoc($result)) {
                                                        echo $item['COUNT(*)'];
                                                    }
                                                }

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Consultas AGENDADAS</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'agendado' AND consulta.posto_id = $id_posto";
                                                $result = mysqli_query($conn, $sql);
                                                if ($result) {
                                                    while ($item = mysqli_fetch_assoc($result)) {
                                                        echo $item['COUNT(*)'];
                                                    }
                                                }

                                                ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Consultas REALIZADAS
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                            <?php
                                                            include '../admin/conexao.php';
                                                            $sql = "SELECT COUNT(*) FROM consulta WHERE consulta.estado = 'atendido' AND consulta.posto_id = $id_posto";
                                                            $result = mysqli_query($conn, $sql);
                                                            if ($result) {
                                                                while ($item = mysqli_fetch_assoc($result)) {
                                                                    echo $item['COUNT(*)'];
                                                                }
                                                            }

                                                            ?></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <!-- Content Row -->


            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>




<?php

require("rodape.php");

?>