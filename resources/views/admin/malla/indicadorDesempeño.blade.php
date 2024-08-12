<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malla Curricular</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal mt-12">
    <header>
        <!--Nav-->
        @include('components.nav-admin-head')
    </header>

    <main>
        <div class="flex flex-col md:flex-row">
            @include('components.nav-admin')
            <section class="w-full">
                <div id="main" class="main-content z-10 mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-100 pt-3">
                        <div
                            class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-sky-400 p-4 shadow text-2xl text-current">
                            <h1 class="font-bold pl-2">Indicador de desempeño saber</h1>
                        </div>
                    </div>
                    @if ($exitoso==true)
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">{{$mensaje}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-green-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Cerrar</title>
                                <path
                                    d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z" />
                            </svg>
                        </span>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">{{ session('error') }}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                            <svg class="fill-current h-6 w-6 text-red-500" role="button"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <title>Cerrar</title>
                                <path
                                    d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z" />
                            </svg>
                        </span>
                    </div>
                    @endif
                    <div class="flex flex-wrap w-full">
                        <div class="pt-10 py-10 px-10 w-full">
                            <form method="POST" action="{{ route('competencia.store') }}">
                                @csrf
                                <p>Selecciona un desempeño para agregarle al indicador de desempeño</p>
                                <div class="mb-5">
                                    <select id="desempeño" onchange="mostrarInput()"
                                        class="block w-full px-4 py-2 border rounded-md">
                                        <option>Selecciona</option>
                                        @foreach ($desempeños as $desempeño)
                                        <option value="{{ $desempeño->id}}">{{ $desempeño->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex">
                                    <div class="flex-auto w-32">
                                        <textarea
                                            class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3 hidden"
                                            id="application-link0" name="name" type="text"
                                            placeholder="Ingresa un indicador de desempeño"></textarea>
                                        <div id="campos-dinamicos">
                                        </div>
                                        <button type="button" class="hidden inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4  md:mt-0" id="agregar-campo">Agregar Campo</button>
                                        <button class="hidden inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4  md:mt-0" type="button" onclick={enviarFormu()}
                                        id="enviar-formu">Guardar</button>
                                    </div>
                                    <div class="flex-auto w-64 ml-5 mb-4">
                                        <table id="table" class="hidden border-collapse table-auto w-full text-sm">
                                            <thead class="bg-slate-200">
                                                <tr>
                                                    <th
                                                        class="border-b dark:border-slate-600 font-medium py-3 pl-2 pb-3 text-left">
                                                        Inidicador desempeño</th>
                                                    <th
                                                        class="border-b dark:border-slate-600 font-medium py-3 pl-2 pb-3 text-left">
                                                        Desempeño</th>
                                                </tr>
                                            </thead>
                                            <tbody class="" id="body-table"></tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <button class="inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4  md:mt-0" onclick="openModal()">Finalizar</button>
                                </div>
                                <!--Modal-->
                                <div id="modal-component-container" class="hidden fixed inset-0">
                                    <div
                                        class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                                        <div
                                            class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen">
                                        </div>
                                        <div id="modal-container"
                                            class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all ms:my-8 sm:align-middle sm:max-w-sm w-full">
                                            <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                                <div class="sm:item-center text-center">
                                                    <h1 class="text-3xl font-bold text-green-600 border-b-2">AVISO</h1>
                                                    <div class="modal-text ">
                                                        <div
                                                            class="modal-wrapper-flex sm:flex items-center justify-center mt-4 text-center">
                                                            <h1 class="text-lg">Malla agregada correctamente</h1>
                                                            <i class="fas fa-check-circle text-green-600"></i>
                                                        </div>
                                                        <div
                                                            class="modal-actions px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                            <button id="closeModal"
                                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                                <a href="{{ route ('dashboard') }}" >Cerrar</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>

                    </div>
                </div>
        </div>
        </form>
        </div>
        </div>
        </div>
        </section>
        </div>
    </main>
    <script>
  
    var indice = 1;

    function mostrarInput() {
        const input = document.getElementById('application-link0');
        const button = document.getElementById('agregar-campo');
        const buttonForm = document.getElementById('enviar-formu');
        const table = document.getElementById('table');
        input.classList.remove('hidden');
        button.classList.remove('hidden');
        buttonForm.classList.remove('hidden');
        table.classList.remove('hidden');
        input.value = '';
        containerDiv = document.getElementById('campos-dinamicos');
        while (containerDiv.firstChild) {
            containerDiv.removeChild(containerDiv.firstChild);
        }
        indice = 1;
    }

    document.getElementById('agregar-campo').addEventListener('click', function () {
        var div = document.createElement('div');
        div.innerHTML =
            `<textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link${indice}" name="name" type="text" placeholder="Ingresa un indicador de desempeño"></textarea>`;
        document.getElementById('campos-dinamicos').appendChild(div);
        indice++;
    });

    function enviarFormu() {
        event.preventDefault();
        const desempeno_id = document.getElementById('desempeño').value;
        for (var i = 0; i < indice; i++) {
            $.ajax({
                url: "/guardarIndicadorDesempeño",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    name: document.getElementById(`application-link${i}`).value,
                    desempeno_id,
                },
                success: function (response) {
                    const desempeno_id = document.getElementById('desempeño');
                        var tr = document.createElement('tr');
                        tr.innerHTML = `
                        <td class='border-b border-slate-100 dark:border-slate-700 p-4'>${response.desempeño}</td>
                        <td class='border-b border-slate-100 dark:border-slate-700 p-4'>${desempeno_id.options[desempeno_id.selectedIndex].text}</td>
                        `
                        document.getElementById('body-table').appendChild(tr); 
                }
            })
        }
    }

    function openModal() {
        event.preventDefault();
        document.getElementById('modal-component-container').classList.remove('hidden');
    }

    </script>
</body>

</html>
