$(document).ready(function(){
    $('.cpf').mask('999.999.999-99');
    $('.data').mask('99/99/9999');
    $('.cnpj').mask('99.999.999/9999-99');
    $('.registroEs').mask('99999999-9');
    $('.dinheiro').mask('###.##0,00', {reverse: true});
});
