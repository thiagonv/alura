<?php
session_start();
require_once("PHPMailerAutoload.php");

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "thiagonv@gmail.com";
$mail->Password = "123";

$mail->setFrom("thiagonv@gmail.com", "Alura teste de mail");
$mail->addAddress("thiagonv@mgmail.com");
$mail->Subject = "Email de contato da loja";

$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");

if($mail->send()) {
	$_SESSION["success"] = "Mensagem enviada com sucesso";
	header("Location: index.php");
} else {
	$_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
	header("Location: contato.php");
}
die();