<?php
require("logado.php");
include_once("conexao.php");
require 'PHPMailer/PHPMailerAutoload.php';


$id_posto = $_SESSION['posto_id'];
$id = mysqli_real_escape_string($conn, $_POST['id']);
$dia = mysqli_real_escape_string($conn, $_POST['dia']);
$estado = mysqli_real_escape_string($conn, 'Agendado');

$result_consulta = "UPDATE consulta SET dia='$dia', estado='$estado' WHERE id = '$id'";
$result_consulta = mysqli_query($conn, $result_consulta);

$sql_email = "SELECT consulta.id as id_consulta,consulta.dia,consulta.id,usuario.nome,usuario.email FROM consulta INNER JOIN usuario ON consulta.usuario_id = usuario.id WHERE consulta.id = '$id'";
$executa = mysqli_query($conn, $sql_email);

while ($item = mysqli_fetch_array($executa)) {

    $nome = $item['nome'];
    $email = $item['email'];
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
$Mailer->Subject = 'Consulta Agendada';

//Corpo da Mensagem

$Mailer->Body = "Olá $nome,<br> Sua consulta foi agendada para o dia $dia.<br> Atenciosamente, <br>Equipe PSF $nome_posto";

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
    $_SESSION['msg'] = "<div class='alert alert-primary text-center'>Consulta aprovada com Sucesso!</div>";
    header("Location: consultas.php");
} else {
    $_SESSION['msg'] = "Erro ao cadastrar";
}
