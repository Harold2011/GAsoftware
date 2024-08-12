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
                        <h1 class="font-bold pl-2">Panel de control</h1>
                    </div>
                </div>
                <div class="flex flex-wrap w-full">
                    <div class="w-full md:w-1/2 xl:w-1/3 p-5">
                        <!--Metric Card-->
                        <a href="{{ route ('elegirMalla.index') }}">
                            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-sky-400 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-sky-400">
                                        <i class="fas fa-folder-open fa-2x fa-inverse"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-gray-600">Malla curricular</h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <!--/Metric Card-->
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
</body>
</html>