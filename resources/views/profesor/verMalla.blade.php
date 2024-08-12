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
            @include('components.nav-profesor')
            <section class="w-full">
                <div id="main" class="main-content z-10 mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-100 pt-3">
                        <div
                            class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-sky-400 p-4 shadow text-2xl text-current">
                            <h1 class="font-bold pl-2">Malla curricular</h1>
                        </div>
                    </div>
                    <div class="my-4 p-5">
                        <div class="mt-2">
                            <a href="{{ route('elegirMalla.index') }}">
                                <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm mt-2">Volver</button>
                            </a>
                        </div>
                        <p class="text-lg font-bold text-center">ELEMENTOS GENERALES</p>
                            <div class="flex my-2.5">
                                <div class="flex mr-4">  
                                    <p class="font-bold mr-1">Semana: </p>                        
                                    <p>{{$mallas['semana']}}</p>
                                </div> 
                                <div class="flex mr-4">
                                    <p class="font-bold mr-1">GRADO: </p>
                                    <p>{{$mallas['grado']}}</p> 
                                </div>
                                <div class="flex mr-4">  
                                    <p class="font-bold mr-1">AREA: </p>                        
                                    <p>{{$mallas['area']}}</p>
                                </div> 
                            </div>
                            <div class="flex mr-4">  
                                <p class="font-bold mr-1">Unidad: </p>                        
                                <p>{{$mallas['unidad']}}</p>
                            </div> 
                        <div class="mt-4">                            
                            <table class="border-collapse table-auto w-full">
                                <thead class="bg-slate-200 text-left">
                                    <tr>
                                        <th class="p-2">Componentes</th>
                                        <th class="p-2">Estandar</th>
                                        <th class="p-2">Competencia</th>
                                        <th class="p-2">Desempeño</th>
                                        <th class="p-2">Indicador desempeño</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr class="border-b border-slate-100 dark:border-slate-700 p-4">
                                            <td class="p-2">{{$mallas['componente']}}</td>
                                            <td class="p-2">{{$mallas['estandar']}}</td>
                                            <td class="p-2">
                                                {{$mallas['competencia']}}
                                            </td>
                                            <td class="p-2">
                                                {{$mallas['desempeño']}}
                                            </td>
                                            <td class="p-2">
                                                {{$mallas['indicador']}}
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
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
</body>

</html>
