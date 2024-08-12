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
        @include('components.nav-admin')
        <section class="w-full">
            <div id="main" class="main-content z-10 mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-100 pt-3">
                    <div class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-sky-400 p-4 shadow text-2xl text-current">
                        <h1 class="font-bold pl-2">Componentes</h1>
                    </div>
                </div>
                @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cerrar</title><path d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z"/></svg>
                    </span>
                </div>
            @endif
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Cerrar</title><path d="M14.348 14.849a1 1 0 0 1-1.414 0L10 11.414l-2.93 2.435a1 1 0 1 1-1.244-1.562l3.333-2.778a1 1 0 0 1 1.244 0l3.333 2.778a1 1 0 0 1 0 1.562z"/></svg>
                    </span>
                </div>
            @endif
                <div id="mallaContainer" class="flex flex-wrap w-full">
                    <div class="pt-10 py-10 px-10 w-full">
                        <form method="POST" action="{{ route('componente.store') }}">
                            @csrf
                            <label for="componentes" class="block">Componentes</label>
                            <input type="hidden" id="unididactica" name="unididactica_id" value="{{ $id }}">
                            <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link0" name="name" type="text" placeholder="Ingresa componente">
                            <!-- Campos dinámicos -->
                            <div id="campos-dinamicos">
                                <!-- Campos dinámicos se agregarán aquí -->
                            </div>
                            <button class="inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4  md:mt-0" type="button" id="agregar-campo">Agregar Campo</button>
                            <button class="inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4  md:mt-0" type="button" onclick={enviarFormu()} id="enviar-formu">Guardar</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="/js/malla.js"></script>
<script>

    var indice=1;
    document.getElementById('agregar-campo').addEventListener('click', function() {
        var div = document.createElement('div');
        div.innerHTML = `<input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link${indice}" name="name" type="text" placeholder="Ingresa un componente">`;
        document.getElementById('campos-dinamicos').appendChild(div);
        indice++;
    });
    function enviarFormu(){
        event.preventDefault();
        const unididactica_id=document.getElementById('unididactica').value;
        for(var i=0; i<indice;i++){
            $.ajax({
                url:"/guardarComponente",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data:{
                    name:document.getElementById(`application-link${i}`).value,
                    unididactica_id,
                },
                success:function(response)
                {
                    console.log(response);                    
                }
            })                
        }
        $.ajax({
            success:function(response)
            {
                window.location.href = "{{ route('componente.create')}}";  
            }
        }) 
    }

    
</script>
</body>

</html>
