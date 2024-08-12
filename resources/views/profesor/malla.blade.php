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
        <div class="flex h-screen flex-col md:flex-row">
            @include('components.nav-profesor')
            <section class="w-full">
                <div id="main" class="main-content z-10 mt-12 md:mt-2 pb-24 md:pb-5">
                    <div class="bg-gray-100 pt-3">
                        <div
                            class="rounded-tl-3xl bg-gradient-to-r from-gray-100 to-sky-400 p-4 shadow text-2xl text-current">
                            <h1 class="font-bold pl-2">Malla curricular</h1>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-end">
                            <a href="{{ route ('elegirMalla.create') }}"
                                class="block no-underline inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4 md:mt-0"><i
                                    class="fa fa-plus-circle"></i>Agregar nueva malla
                            </a>
                        </div>
                        <div class="mt-4">
                            <table class="border-collapse table-auto w-full">
                                <thead class="bg-slate-200 text-left">
                                    <tr>
                                        <th class="p-2">Semana</th>
                                        <th class="p-2">Grado</th>
                                        <th class="p-2">Area</th>
                                        <th class="p-2">Unidad didactica</th>
                                        <th class="p-2">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mallas as $malla)
                                        <tr class="border-b border-slate-100 dark:border-slate-700 p-4">
                                            <td class="p-2">{{$malla['semana']}}</td>
                                            <td class="p-2">{{$malla['grado']}}</td>
                                            <td class="p-2">{{$malla['area']}}</td>
                                            <td class="p-2">{{$malla['unidad']}}</td>
                                            <td class="p-2">
                                                <a class="block no-underline inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4 md:mt-0" href="{{ route('elegirMalla.show', $malla['id']) }}">
                                                    Ver mas
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
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
