<?php

// Importando as classes do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Iniciar uma sessão
if(!isset($_SESSION))
    session_start();

//Importando o autoload do composer
require '../../vendor/autoload.php';
require '../ValidacaoEmail/validacao.php';

if($validate == true){
    //Criando uma instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        //Configurações do server
        $mail->isSMTP(); //Definindo que vai usar o SMTP
        $mail->Host = 'smtp.gmail.com'; //Definindo o e-mail do host
        $mail->SMTPAuth   = true; //Ativanmdo a autenticação SMTP
        $mail->Username   = ''/** ADICIONAR EMAIL SMTP **/;; //Definindo o nome SMTP
        $mail->Password   = ''/** ADICIONAR SENHA SMTP **/; //Definindo a senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Ativando a criptografia SMTP
        $mail->Port       = 465; //Definindo a porta TCP

        //Definindo o remetente e o destinatário
        $mail->setFrom(''/** ADICIONAR E-MAIL REMETENTE**/, $nome); //Definindo o e-mail do remetente
        $mail->addAddress(''/** ADICIONAR E-MAIL DESTINATÁRIO **/ , 'Destinatário'); //Definindo o destinatário    

        //Conteúdo do e-mail
        $mail->isHTML(true); //Definindo HTML                         
        $mail->Subject = $assuntoEmail; //Definindo o assunto do e-mail
        $mail->Body    = $corpoEmail; //Definindo o corpo do e-mail
        $mail->AltBody = $corpoEmail; //Definindo o corpo do e-mail quando possui apenas HTML

        $mail->send();
        $_SESSION["mensagemConfirmacao"] = "E-mail enviado com sucesso";
        header('Location: ../PaginaPrincipal/paginaInicial.php'); //Retorna com uma mensagem de confirmação
    } catch (Exception $e) {
        error_log("Erro EnvioEmail:" + $e->getMessage());
        $_SESSION["mensagemConfirmacao"] = "Não foi possível enviar o e-mail";
        header('Location: ../PaginaPrincipal/paginaInicial.php'); //Retorna com uma mensagem de erro
    }
}

?>