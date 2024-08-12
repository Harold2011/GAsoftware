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
                        <h1 class="font-bold pl-2">Malla Curricular</h1>
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
                <div class="flex flex-wrap w-full">
                    <div class="pt-10 py-10 px-10 w-full">
                        <form action="{{ route('unidad.store') }}" method="post">
                            @csrf
                            <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <label for="grado" class="block">Grado:</label>
                                        <select id="grado" name="grado_id" class="block w-full px-4 py-2 border rounded-md">
                                            @foreach ($grado as $grados)
                                                <option value="{{ $grados->id}}">{{ $grados->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="area" class="block">Área:</label>
                                        <select id="area" name="area_id" class="block w-full px-4 py-2 border rounded-md">
                                            @foreach ($area as $areas)
                                                <option value="{{ $areas->id }}">{{ $areas->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <label for="unididactica" class="block">Unidad didactica:</label>
                            <textarea class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" name="name" placeholder="Ingresa la unidad didactica" rows="5"></textarea>
                            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i class="fa fa-arrow-right"></i>Siguente</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="/js/js-admin.js"></script>
</body>

</html>
