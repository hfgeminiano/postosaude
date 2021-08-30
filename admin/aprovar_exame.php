<<<<<<< HEAD
<?php

require("logado.php");
include_once("conexao.php");
require 'PHPMailer/PHPMailerAutoload.php';

$id_posto = $_SESSION['posto_id'];
$id = mysqli_real_escape_string($conn, $_POST['id']);
$dia = mysqli_real_escape_string($conn, $_POST['dia']);
$estado = mysqli_real_escape_string($conn, 'Agendado');

$result_consulta = "UPDATE exame SET dia='$dia', estado='$estado' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);


$sql_email = "SELECT exame.id,exame.laboratorio_id,exame.tipo,exame.usuario_id,usuario.nome,usuario.id AS id_usuario,usuario.email ,laboratorio.id, laboratorio.nome as lab_nome FROM exame INNER JOIN usuario ON exame.usuario_id = usuario.id INNER JOIN laboratorio ON exame.laboratorio_id = laboratorio.id WHERE exame.id = '$id'";
$executa = mysqli_query($conn, $sql_email);

while ($item = mysqli_fetch_array($executa)) {

    $nome = $item['nome'];
    $email = $item['email'];
    $tipo = $item['tipo'];
    $lab = $item['lab_nome'];
}

$sql = "SELECT nome as nome_posto FROM posto WHERE id = $id_posto";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($item = mysqli_fetch_assoc($result)) {
        $nome_posto = $item['nome_posto'];
    }
}

$Mailer = new PHPMailer();

//Define que será usado SMTP
$Mailer->IsSMTP();

//Enviar e-mail em HTML
$Mailer->isHTML(true);
//Aceitar carasteres especiais
$Mailer->Charset = 'UTF-8';

//Configurações
$Mailer->SMTPAuth = true;
$Mailer->SMTPSecure = 'tls';

//nome do servidor
$Mailer->Host = 'smtp.live.com';
//Porta de saida de e-mail
$Mailer->Port = 587;

//Dados do e-mail de saida - autenticação
$Mailer->Username = 'nenoskazi@msn.com';
$Mailer->Password = 'Neno3568';

//E-mail remetente (deve ser o mesmo de quem fez a autenticação)
$Mailer->From = 'nenoskazi@msn.com';

//Nome do Remetente
$Mailer->FromName = "PSF";

//Assunto da mensagem
$Mailer->Subject = 'Exame Agendado';

//Corpo da Mensagem

$Mailer->Body = "Olá $nome,<br> Seu Exame de $tipo foi agendado para o dia $dia, no labóratorio: $lab.<br> Atenciosamente, <br>Equipe PSF $nome_posto";

//Corpo da mensagem em texto
$Mailer->AltBody = 'conteudo do E-mail em texto';

//Destinatario
$Mailer->AddAddress($email);

if ($Mailer->Send()) {
    echo "E-mail enviado com sucesso";
} else {
    echo "Erro no envio do e-mail: " . $Mailer->ErrorInfo;
}

if (mysqli_close($conn)) {
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Aprovado com Sucesso!</div>";
    header("Location: examespre.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
=======
<?php

include_once("conexao.php");
$id = mysqli_real_escape_string($conn, $_POST['id']);
$dia = mysqli_real_escape_string($conn, $_POST['dia']);
$estado = mysqli_real_escape_string($conn, 'Agendado');

$result_consulta = "UPDATE exame SET dia='$dia', estado='$estado' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

if (mysqli_close($conn)) {
    $_SESSION['msgcad'] = "<div class='alert alert-primary'>Alterado com Sucesso!</div>";
    header("Location: posto.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
>>>>>>> 62828064174834c0b719f2f749d627273554e9f7
