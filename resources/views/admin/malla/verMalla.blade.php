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
                            <h1 class="font-bold pl-2">Malla curricular</h1>
                        </div>
                    </div>
                    <div>
                        <div>
                            <div class="mt-2">
                                <a href="{{ route('malla.index') }}">
                                    <button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm mt-2">Volver</button>
                                </a>
                            </div>
                            <p class="text-lg font-bold text-center">ELEMENTOS GENERALES</p>
                            <div class="flex m-2.5">
                                <div class="flex mr-4">
                                    <p class="font-bold mr-1">GRADO: </p>
                                    @foreach($grados as $grado)
                                    <p>{{$grado->name}}</p> 
                                    @endforeach
                                </div>
                                <div class="flex">  
                                    <p class="font-bold mr-1">AREA: </p>                        
                                    @foreach($areas as $area)
                                    <p>{{$area->name}}</p>
                                    @endforeach
                                </div> 
                            </div>
                            <div>
                                <div class=" m-2.5">
                                    <p class="font-bold">UNIDAD DIDACTICA</p>
                                    <p>{{$unidad_data['name']}}</p>
                                </div>
                                <div class="bg-white m-2.5">
                                    <div class="flex border-b-2 border-gray-500 p-1 bg-neutral-300 ">
                                        <p class="w-1/6 font-bold p-2">Componente</p>
                                        <p class="w-1/6 font-bold p-2">Estandar</p>
                                        <p class="w-1/6 font-bold p-2">Competencia</p>
                                        <p class="w-1/6 font-bold p-2">Desempeño</p>
                                        <p class="w-1/5 font-bold px-3 py-2">Indicador de desempeño</p>
                                    </div>
                                    @foreach($unidad_data['componentes'] as $componente)
                                    <div class=" flex border-b-2 border-gray-500 ">
                                        <div class="p-1 w-1/5 border-r-2 border-gray-500">
                                        {{$componente['name']}}
                                        </div>
                                        <div class="w-full ">
                                            @foreach($componente['estandares'] as $estandar)
                                            <div class="flex">
                                                <div class="p-1 w-3/12 border-r-2 border-b-2 border-gray-500">
                                                    {{$estandar['name']}}
                                                </div>
                                                <div class="w-full">
                                                    @foreach($estandar['competencias'] as $competencia)
                                                    <div class="flex">
                                                        <div class="p-1 w-2/6 border-r-2 border-b-2 border-gray-500">
                                                            {{$competencia['name']}}
                                                        </div>
                                                        <div class="w-full">
                                                            @foreach($competencia['desempeños'] as $desempeño)
                                                            <div class=" flex">
                                                                <div class="p-1 w-3/6 border-r-2 border-b-2 border-gray-500 ">
                                                                    {{$desempeño['name']}}
                                                                </div>
                                                                <div class="w-full relative ">
                                                                    @foreach($desempeño['indicadores'] as $indicador)
                                                                    <div class="absolute last:bottom-0">
                                                                        <div class="p-1 border-b-2 border-gray-500  ">
                                                                            <p>{{$indicador['name']}}</p>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
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
</body>

</html>
