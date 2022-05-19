<script > https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js </script>

PagSeguroDirectPayment.setSessionId('<?php echo $session; ?>');
    console.log('<?php echo $session; ?>');


    // Busca o token do cartão a partir do valor fornecido pelo usuário
    $("#creditCardNumber").keyup(function() {
      if ($("#creditCardNumber").val().length >= 6) {
        PagSeguroDirectPayment.getBrand({
          cardBin: $("#creditCardNumber").val().substring(0, 6),
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
    // Função que busca os metodos de pagamento
    function getPaymentMethods(valor) {
      PagSeguroDirectPayment.getPaymentMethods({
        amount: valor,
        success: function(response) {
          //console.log(JSON.stringify(response));
          console.log(response);
        },
        error: function(response) {
          console.log(JSON.stringify(response));
        }
      })
    }
    //Função que demonstra os valores de parcelamento para o usuário 
    document.getElementById('checkoutValue')
      .addEventListener('focusout', getInstallments);

    function getInstallments() {
      var brand = $("#creditCardBrand").val();
      PagSeguroDirectPayment.getInstallments({
        amount: $("#checkoutValue").val().replace(",", "."),
        brand: brand,
        maxInstallmentNoInterest: 2, //calculo de parcelas sem juros
        success: function(response) {
          var installments = response['installments'][brand];
          buildInstallmentSelect(installments);
        },
        error: function(response) {
          console.log(response);
        }
      })
    }



    listaMeiosPagamento();
    //Função que demonstra os meios de pagamentos
    function listaMeiosPagamento() {
      PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(data) {
          $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj) {
            $('.tipoCartao').append("<div><img src=https://stc.pagseguro.uol.com.br/" + obj.images.SMALL.path + ">" + obj.name + "</div>");
          });

          $('.Boleto').append("" + data.paymentMethods.BOLETO.name + "");

          $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj) {
            $('.Debito').append("" + obj.name + "");
          });
        },
        complete: function(data) {}
      });
    }