<?php

require("logado.php");
?>
<header>
    <?php

    require("cabecalho.php");
    $id_posto = $_SESSION['posto_id'];
    $nome = $_SESSION['nome'];
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
                                                <a href="examespre.php">EXAMES PRÉ AGENDADOS</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM exame WHERE exame.estado = 'pre agendado' AND exame.posto_id = $id_posto";
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
                                                <a href="examesagen.php">EXAMES AGENDADOS</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                include '../admin/conexao.php';
                                                $sql = "SELECT COUNT(*) FROM exame WHERE exame.estado = 'agendado' AND exame.posto_id = $id_posto";
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
                                                $sql = "SELECT COUNT(*) FROM exame WHERE exame.estado = 'atendido' AND exame.posto_id = $id_posto";
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
                                                <a href="consultas.php">CONSULTAS PRÉ AGENDADAS</a>
                                            </div>
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
                                                <a href="agendadas.php"> CONSULTAS AGENDADAS</a>
                                            </div>
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
                <div class="col-xl-6 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Consultas Agendadas</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">

<<<<<<< HEAD
                            <div class="unit w-2-3">
                                <div class="hero-callout">
                                    <?php



                                    $resultado = $conn->query("SELECT consulta.dia,consulta.motivo,usuario.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id  WHERE consulta.estado = 'agendado' AND consulta.posto_id = $id_posto");

                                    echo "<table id='dados' class='table table-bordered table-hover display'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Paciente</th><th>Dia</th><th>Motivo</th>";
                                    echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";

                                    while ($linha = $resultado->fetch_array()) {

                                        echo "<tr>";
                                        echo "<td>{$linha['nome']}</td>";
                                        echo "<td>{$linha['dia']}</td>";
                                        echo "<td>{$linha['motivo']}</td>";


                                        echo "</tr>";
                                    }


                                    echo "</tbody>";

                                    echo "</table>";
                                    ?>
                                </div>
                            </div>
=======
                        <div class="unit w-2-3">
                                <div class="hero-callout">
                                <?php
                                
                                    
                                                                                
                                    $resultado = $conn->query("SELECT consulta.dia,consulta.motivo,usuario.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id  WHERE consulta.estado = 'agendado' AND consulta.posto_id = $id_posto");
                                                                            
                                        echo "<table id='dados' class='table table-bordered table-hover display'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Paciente</th><th>Dia</th><th>Motivo</th>";
                                        echo "</tr>";
                                        echo "</thead>";

                                        echo "<tbody>";

                                        while($linha = $resultado->fetch_array()){
                                        
                                        echo "<tr>";   
                                        echo "<td>{$linha['nome']}</td>";                                              
                                        echo "<td>{$linha['dia']}</td>";
                                        echo "<td>{$linha['motivo']}</td>";           
                                    
                                    
                                        echo "</tr>";

                                        }
                                    

                                        echo "</tbody>";

                                        echo "</table>";
                                ?>
                            </div>
                        </div>                                
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7


                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Consultas Realizadas</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">


<<<<<<< HEAD
                            <div class="unit w-2-3">
                                <div class="hero-callout">
                                    <?php



                                    $resultado = $conn->query("SELECT consulta.id,consulta.dia,consulta.motivo,consulta.observacao,usuario.nome,medico.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id INNER JOIN medico on consulta.medico_id = medico.id WHERE consulta.estado = 'atendido' AND consulta.posto_id = $id_posto AND consulta.tipo_paciente = 0");

                                    echo "<table id='dados2' class='table table-bordered table-hover display'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Paciente</th><th>Dia</th><th>Observação</th><th>Motivo</th><th>Médico</th>";
                                    echo "</tr>";
                                    echo "</thead>";

                                    echo "<tbody>";

                                    while ($linha = $resultado->fetch_array()) {

                                        echo "<tr>";
                                        echo "<td>{$linha[4]}</td>";
                                        echo "<td>{$linha['dia']}</td>";
                                        echo "<td>{$linha['observacao']}</td>";
                                        echo "<td>{$linha['motivo']}</td>";
                                        echo "<td>{$linha['nome']}</td>";


                                        echo "</tr>";
                                    }


                                    echo "</tbody>";

                                    echo "</table>";
                                    ?>
                                </div>
                            </div>
=======
                        <div class="unit w-2-3">
                                <div class="hero-callout">
                                <?php
                                
                                    
                                                                                
                                    $resultado = $conn->query("SELECT consulta.id,consulta.dia,consulta.motivo,consulta.observacao,usuario.nome,medico.nome FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id INNER JOIN medico on consulta.medico_id = medico.id WHERE consulta.estado = 'atendido' AND consulta.posto_id = $id_posto AND consulta.tipo_paciente = 0");
                                                                            
                                        echo "<table id='dados2' class='table table-bordered table-hover display'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Paciente</th><th>Dia</th><th>Observação</th><th>Motivo</th><th>Médico</th>";
                                        echo "</tr>";
                                        echo "</thead>";

                                        echo "<tbody>";

                                        while($linha = $resultado->fetch_array()){
                                        
                                        echo "<tr>";   
                                        echo "<td>{$linha[4]}</td>";                                        
                                        echo "<td>{$linha['dia']}</td>";        
                                        echo "<td>{$linha['observacao']}</td>";
                                        echo "<td>{$linha['motivo']}</td>";
                                        echo "<td>{$linha['nome']}</td>";           
                                    
                                    
                                        echo "</tr>";

                                        }
                                    

                                        echo "</tbody>";

                                        echo "</table>";
                                ?>
                            </div>
                        </div>     
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7

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

<script>
<<<<<<< HEAD
    $(document).ready(function() {
        $('#dados').DataTable({
            "order": [
                [1, 'asc']
            ],
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Pr&oacute;ximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "&Uacute;ltimo"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#dados2').DataTable({
            "order": [
                [1, 'asc']
            ],
            language: {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar",
                "oPaginate": {
                    "sNext": "Pr&oacute;ximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "&Uacute;ltimo"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        });
    });
</script>
=======
      $(document).ready( function () {
        $('#dados').DataTable( {
			"order": [[1, 'asc']],
			language: {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ resultados por p&aacute;gina",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sNext": "Pr&oacute;ximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "&Uacute;ltimo"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
			}
			}
			} );
      } );
    </script>

<script>
      $(document).ready( function () {
        $('#dados2').DataTable( {
			"order": [[1, 'asc']],
			language: {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ resultados por p&aacute;gina",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sNext": "Pr&oacute;ximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "&Uacute;ltimo"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
			}
			}
			} );
      } );
    </script>
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7


<?php

require("rodape.php");

?>