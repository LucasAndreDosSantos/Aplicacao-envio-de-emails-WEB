$().ready(function () { //Inicia a função Jquery quando ser seguro para manipular
    $("#formdados").validate({ // Validade o formulário especificado

      //Define as regras para os campos do formulário
      rules: {
        cnome: {
          required: true, //Define que é obrigatório escrever algo para poder enviar
          minlength: 2 //Define que deve-se digitar no mínimo 2 caracteres
        },
        ctelefone: {
          required: true,
          number: true, //Define que seja aceito apenas números
          minlength: 11,
          maxlength: 11, //Define que o máximo de caractéres aceitos é 11
        },
        cemail: {
          required: true,
          email: true //Define que seja aceito apenas e-mails válidos
        },
        cmensagem: {
          required: true,
          minlength: 2,
          maxlength: 1000
        }
      },
  
      // Define a mensagem de aviso que sera enviado ao desobedecer algumas das regras
      messages: {
        cnome: {
          required: "Entre com o seu nome",
          minlength: jQuery.validator.format("São necessários {0} caracteres!")
        },
        ctelefone: {
          required: "Entre com o seu telefone",
          number: "Escreva apenas números",
          minlength: jQuery.validator.format("Digite o telefone no formato DD + numero de telefone, assim {0} números"),
          maxlength: jQuery.validator.format("Digite o telefone no formato DD + numero de telefone, assim {0} números")
        },
        cemail: {
          required: "Entre com o seu e-mail",
          email: "Escreva um e-mail válido"
        },
        cmensagem: {
          required: "Entre com a mensagem",
          minlength: jQuery.validator.format("São necessários {0} caracteres!"),
          maxlength: jQuery.validator.format("Você ultrapassou o limite de {0} caracteres!")
        }
      }

    });
});

