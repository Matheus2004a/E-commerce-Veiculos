<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact 1</title>
    <link rel="stylesheet" href="../../config/setup.css">
</head>

<body>
    <form action="https://api.staticforms.xyz/submit" method="post">
        <div class="w-full flex items-center justify-center my-12">
            <input type="hidden" name="accessKey" value="0c075edd-ba26-42a7-bf2e-7754b154858a">
            <div class="absolute top-40 bg-white shadow rounded py-12 lg:px-28 px-8">
                <p class="md:text-3xl text-xl font-bold leading-7 text-center text-gray-700">Contato</p>
                <div class="md:flex items-center mt-12">
                    <div class="md:w-72 flex flex-col">
                        <label class="text-base font-semibold leading-none text-gray-800">Nome</label>
                        <input tabindex="0" arial-label="Please input name" type="name" name="name" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input  name" />
                    </div>
                    <div class="md:w-72 flex flex-col md:ml-6 md:mt-0 mt-4">
                        <label class="text-base font-semibold leading-none text-gray-800">Seu Email </label>
                        <input tabindex="0" arial-label="Please input email address" type="name" name="email" class="text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100" placeholder="Please input email address" />
                    </div>
                </div>
                <div>
                    <div class="w-full flex flex-col mt-8">
                        <label class="text-base font-semibold leading-none text-gray-800">Mensagem</label>
                        <textarea tabindex="0" aria-label="leave a message" name="message" role="textbox" type="name" class="h-36 text-base leading-none text-gray-900 p-3 focus:oultine-none focus:border-indigo-700 mt-4 bg-gray-100 border rounded border-gray-200 placeholder-gray-100 resize-none"></textarea>
                    </div>
                </div>
                <p class="text-xs leading-3 text-gray-600 mt-4">Ao clicar em enviar, você concorda com nossos termos de serviço, política de privacidade e como usamos os dados conforme declarado</p>
                <div class="flex items-center justify-center w-full">
                    <button class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none">SUBMIT</button>
                    <button class="mt-9 text-base font-semibold leading-none text-white py-4 px-10 bg-indigo-700 rounded hover:bg-indigo-600 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none" style="margin-left: 5px;">VOLTAR</button>
                </div>
                <input type="hidden" name="redirectTo" value="http://localhost/E-commerce-veiculos/">
            </div>
        </div>
    </form>
        <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>