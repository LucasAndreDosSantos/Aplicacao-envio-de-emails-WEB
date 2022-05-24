<!doctype html>
<html lang="pt-br">

<head>
  <?php
    //Iniciar uma sessão
    if(!isset($_SESSION))
      session_start();
  ?>
  <meta charset="utf-8">
  <!-- Importando a biblioteca Jquery online-->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

  <!-- Importando o arquivo JavaScript de validação do formulário -->
  <script type="text/javascript" src="../ValidacaoEmail/validacao.JS"></script>

  <!-- Importando o CSS dos estilos do formulário -->
  <link rel="stylesheet" type="text/css" href="estilosFormulario.css">
  <?php include "../Cabecalho/cabecalho.php" // Incluindo o cabeçalho no código?>

  <h2 class="mensagem"> Mensagem </h2>

  <!-- Formulário com nome, telefone, e-mail , mensagem e botão de envio, encaminhando para o php de validação -->
  <div class="quadradoformulario">
  <form id="formdados" method="POST" action="../EnvioEmail/envioEmail.php" novalidate="novalidate">
      <p class="linhaFormulario">
        <label class="textoForm" for="cnome">Nome*</label>
        <input class="inputForm" type="text" id="cnome" name="cnome">
      </p>
      <p class="linhaFormulario"> 
        <label class="textoForm" for="ctelefone">Telefone*</label>
        <input class="inputForm" type="text" id="ctelefone" name="ctelefone">
      </p>
      <p class="linhaFormulario">
        <label class="textoForm" for="cemail">E-mail*</label>
        <input class="inputForm" type="email" id="cemail" name="cemail">
      </p>
      <p class="linhaAreaFormulario">
        <label class="textoAreaForm" for="cmensagem">Mensagem*</label>
        <textarea class="inputareaForm" id="cmensagem" name="cmensagem"></textarea>
      </p>
      <input class="botaoConfirmacao" type="submit" value="Enviar Mensagem" >
  </form>
  </div>

  <?php

    //Verificar se existe uma mensagem de confirmação
    if (isset($_SESSION["mensagemConfirmacao"])) {
      echo "<script language='javascript'>";
      echo "alert('".$_SESSION["mensagemConfirmacao"]."');"; // Imprime uma mensagem de confirmação
      echo "</script>";
      //Exclui a mensagem da sessão 
      unset($_SESSION["mensagemConfirmacao"]); //Exclui a mensagem da seção
    }
  ?>

</body>

</html>