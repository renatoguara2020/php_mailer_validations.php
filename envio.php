<?php

require_once 'connectionPDO1.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
                 $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_SPECIAL_CHARS);
       }
      if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                 $mensagem = filter_input(INPUT_POST,'mensagem', FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    // $mail = new PHPMailer;

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'exemplo@gmail.com';
    $mail->Password = 'senha';
    $mail->Port = 587;

    $mail->setFrom('email@gmail.com', 'Contato');
    $mail->addAddress('email@mail.com.br');

   $mail->isHTML(true);

    $mail->Subject = $assunto;
   $mail->Body    = nl2br($mensagem);
    $mail->AltBody = nl2br(strip_tags($mensagem));

   if(!$mail->send()) {
echo 'Não foi possível enviar a mensagem.<br>';
        echo 'Erro: ' . $mail->ErrorInfo;
} else {
        header('Location: index.php?enviado');
   }