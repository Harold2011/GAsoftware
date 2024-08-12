<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Panel de control</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
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
        @include('components.nav-profesor')
        <section class="w-full">
            <div id="main" class="main-content mt-12 md:mt-2 pb-24 h-screen md:pb-5">

                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-sky-400 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Malla curricular</h1>
                    </div>
                </div>
                <div class="m-2.5">
                    <div class="my-2.5">
                        <a href="{{ route('elegirMalla.index') }}">
                            <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm mt-2">Volver</button>
                        </a>
                    </div>
                    <div class="grid grid-cols-3 gap-3 mb-2.5">
                        <input type="hidden" id="usuario" value="{{Auth::user()->id}}">
                        <div>
                            <p>Semana</p>
                            <select name="" onclick="" id="semana" class="block w-full px-4 py-2 border rounded-md">
                                <option value="0">Selecciona una semana</option>
                                @foreach($semanas as $semana)
                                    <option value="{{$semana->id}}">{{$semana->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p>Area</p>
                            <select name="" onclick="getUnidadDidactica()" id="area" class="block w-full px-4 py-2 border rounded-md">
                                <option value="0">Selecciona un area</option>
                                @foreach($areas as $area)
                                    <option value="{{$area->id}}">{{$area->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <p>Grado</p>
                            <select name="" onclick="getUnidadDidactica()" id="grado" class="block w-full px-4 py-2 border rounded-md">
                                <option value="0">Selecciona un grado</option>
                                @foreach($grados as $grado)
                                    <option value="{{$grado->id}}">{{$grado->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div id="contenido" ></div>  
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
        </section>
    </div>
    <script src="{{asset('js/malla.js')}}"></script>
    <script>
        function crearMalla(){
        const usuario=parseInt(document.getElementById("usuario").value);
        const area=parseInt(document.getElementById("area").value);
        const semana=parseInt(document.getElementById("semana").value);
        const grado=parseInt(document.getElementById("grado").value);  
        const unidad=parseInt(document.getElementById("unidad").value);
        const componente=parseInt(document.getElementById("componente").value);
        const estandar=parseInt(document.getElementById("estandar").value);
        const competencia=parseInt(document.getElementById("competencia").value);
        const desempeño=parseInt(document.getElementById("desempeño").value);
        const indicadorDesempeño=parseInt(document.getElementById("indicadorDesempeño").value);
        console.log("semana: "+semana," area: "+area,"grado: "+grado," unidad: "+unidad," componente: "+componente," estandar: "+estandar," competencia: "+competencia," desempeño: "+desempeño," indicadorDesempeño: "+indicadorDesempeño,)

        $.ajax({
                url:"/guardarMalla",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{
                    usuario,
                    semana,
                    area,
                    grado,
                    unidad,
                    componente,
                    estandar,
                    competencia,
                    desempeño,
                    indicadorDesempeño,
                },
                success:function(response)
                {
                    document.getElementById('modal-component-container').classList.remove('hidden');
                }
        }) 

}
    </script>
</main>
</body>
</html>