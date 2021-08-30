<?php

require("logado.php");

?>

<?php

require("cabecalho.php");

?>

<div class="container">
			<h2 class="display-2">Dependentes Cadastrados </h2>
			<table class = "table table-bordered table-hover">
				<tr>
				
					<th>Nome</th>	
					<th>Nascimento</th>					
					<th>Sexo</th>
                    <th>Parentesco</th>
                    <th>Identificação</th>
					
				</tr>
				<?php
				
					require("conexao.php");
					$id_paciente = $_SESSION['id'];                    
                    $sql = "SELECT dependentes.id,dependentes.nome,dependentes.nascimento,dependentes.sexo,dependentes.parentesco,dependentes.identificacao FROM dependentes WHERE dependentes.usuario_id = $id_paciente";
					$executa = mysqli_query($conn,$sql);
					while($linha = mysqli_fetch_array($executa))
					{
					echo "<tr>";
          
                        echo "<td>".$linha['nome']."</td>";
						echo "<td>".$linha['nascimento']."</td>";				
						echo "<td>".$linha['sexo']."</td>";
                        echo "<td>".$linha['parentesco']."</td>";
						echo "<td>".$linha['identificacao']."</td>";				
									
						
						
					}
				
				
				?>
  
  </div>
	  </table>

<?php

require("rodape.php");

?>