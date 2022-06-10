var Root="http://"+document.location.hostname+"/";
// Iniciar a seção de pagamento

function iniciarSessao()
{
    $.ajax({
       url: Root+"controller/ControllerId.php",
        type: 'POST',
        dataType: 'html',
        success:function(data){
            console.log(data);
        },
        complete: function(){
            listaMeiosPagamento();
        }
    });
}

function listaMeiosPagamento()
{
    PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(data) {
            $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj){
                $('.tipoCartao').append("<div><img src=https://stc.pagseguro.uol.com.br/"+obj.images.SMALL.path+">"+obj.name+"</div>");
            });

            $('.Boleto').append(""+data.paymentMethods.BOLETO.name+"");

            $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj){
                $('.Debito').append(""+obj.name+"");
            });
        },
        complete: function(data) {
        }
    });
}

iniciarSessao();


$("#creditCardNumber").keyup(function(){
    if ($("#creditCardNumber").val().length >= 6) {
        PagSeguroDirectPayment.getBrand({
            cardBin: $("#creditCardNumber").val().substring(0,6),
            success: function(response) { 
                    console.log(response);
                    $("#creditCardBrand").val(response['brand']['name']);
                    $("#creditCardCvv").attr('size', response['brand']['cvvSize']);
            },
            error: function(response) {
                console.log(response);
            }
        })
    };
})

//APi ViaCep para pesquisa de endereço dinâmico
document.getElementById('cep')
        .addEventListener('focusout',pesquisarCep);

const pesquisarCep = () => {
    alert ("Ola Mundo");
}
