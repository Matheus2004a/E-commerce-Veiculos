 //Uso da api ViaCep para requisitar cep do usuário
 'use strict';
 //APi ViaCep para pesquisa de endereço dinâmico
 const preencherFormulario = (endereco) => {
   document.getElementById('endereco').value = endereco.logradouro;
   document.getElementById('bairroEnd').value = endereco.bairro;
   document.getElementById('cidadeEnd').value = endereco.localidade;
   document.getElementById('estadoEnd').value = endereco.uf;
 }
 const pesquisarCep = async () => {
   const cep = document.getElementById('cepEndec').value;
   const url = 'https://viacep.com.br/ws/' + cep + '/json/';
   const dados = await fetch(url);
   const endereco = await dados.json();
   preencherFormulario(endereco);

 }

 document.getElementById('cepEndec')
   .addEventListener('focusout', pesquisarCep);