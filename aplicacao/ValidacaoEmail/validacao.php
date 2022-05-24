<?php
// Importando as classes do PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Criando uma instância do PHPMailer
$mail = new PHPMailer(true);

//Iniciar uma sessão
if(!isset($_SESSION))
    session_start();

$nome = isset($_POST['cnome']) ? $_POST['cnome'] : null; //Define se o nome foi passado pelo POST
$telefone = isset($_POST['ctelefone']) ? $_POST['ctelefone'] : null; //Define se o telefone foi passado pelo POST
$email= isset($_POST['cemail']) ? $_POST['cemail'] : null; //Define se o e-mail foi passado pelo POST
$mensagem = isset($_POST['cmensagem']) ? $_POST['cmensagem'] : null; //Define se a mensagem foi passada pelo POST

if($nome && $mensagem && $email && $telefone != null){ //Inicia apenas se todos os valores forem difentes de NULL
    $options = array( //  Define as opções de filtro de tamanho
        'options' => array(
            'min_range' => 11,
            'max_range' => 11,
        )
    );
    
    $telefone = filter_var($telefone, FILTER_SANITIZE_NUMBER_INT); //Tira elementos que não são numeros
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);   //Tira elementos não aceitaveis em um e-mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && filter_var($telefone, FILTER_VALIDATE_INT,$options) == FALSE) { //Verifica e valida os valores de e-mail e telefone
        $corpoEmail = "$mensagem <br><br>Atenciosamente,<br>$nome,<br>$email,<br>$telefone"; //Definindo a mensagem que vai aparecer no corpo do e-mail
        $assuntoEmail = "Email - $nome" ; //Definindo o assunto do e-mail
        $validate = true; //Define que os valores passaram na validação PHP
    }else{
        $_SESSION["mensagemConfirmacao"] = "Os valores enviados não são válidos";
        header('Location: ../PaginaPrincipal/paginaInicial.php'); //Retorna com uma mensagem de erro
    }

}else{
    $_SESSION["mensagemConfirmacao"] = "Os valores do formulário não podem ser nulos";
    header('Location: ../PaginaPrincipal/paginaInicial.php'); //Retorna com uma mensagem de erro
}

?>