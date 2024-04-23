<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Area</title>
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
                        <h1 class="font-bold pl-2">Area</h1>
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
                    <div class="pt-10 py-10 px-10">
                        <button id="openModal" class="inline-flex items-center bg-sky-400 border-0 py-1 px-3 focus:outline-none hover:bg-gray-500 text-white rounded text-base mt-4 md:mt-0">Agregar Area</button>
                    </div>
                    
                    <div class="flex flex-wrap w-full py-20 px-12 lg:px-24 shadow-xl mb-24">
                        
                            <!--tablet-->
                            <div class="flex flex-col w-full">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                  <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                      <table
                                        class="min-w-full text-left text-sm font-light text-surface dark:text-white">
                                        <thead
                                          class="border-b border-neutral-200 font-medium dark:border-white/10">
                                          <tr>
                                            <th scope="col" class="px-6 py-4">#</th>
                                            <th scope="col" class="px-6 py-4">Nombre</th>
                                            <th scope="col" class="px-6 py-4">Accion</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($area as $areas)
                                          <tr class="border-b border-neutral-200 dark:border-white/10">
                                              <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $areas->id }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">{{ $areas->name }}</td>
                                              <td class="whitespace-nowrap px-6 py-4">
                                                <form id="deleteForm_{{ $areas->id }}" action="{{ route('area.destroy', $areas->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-red-400 text-white p-2 rounded" onclick="confirmarBorrado({{ $areas->id }})"><i class="fa fa-trash"></i></button>
                                                    <a href="{{ route('area.edit', $areas->id) }}" class="bg-gray-400 text-white p-2 rounded"><i class="fa fa-pen"></i></a>
                                                </form>
                                              </td>
                                          </tr>
                                      @endforeach                                  
                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <!--Modal-->
                            <div id="modal-component-container" class="hidden fixed inset-0">
                                <div class="modal-flex-container flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="modal-bg-container fixed inset-0 bg-gray-700 bg-opacity-75"></div>
                                    <div class="modal-space-container hidden sm:inline-block sm:align-middle sm:h-screen"></div>
                                    <div id="modal-container" class="modal-container inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all ms:my-8 sm:align-middle sm:max-w-lg w-full">
                                        <div class="modal-wrapper bg-white px-4 pt-5 pb-4 sm:p-6 sm:pd-4">
                                            <div class="modal-wrapper-flex sm:flex sm:item-start">
                                                <div class="modal-icon mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-sky-400  sm:mx-0 sm:h-10 sm:w-10"><i class="fa fa-school fa-2x fa-inverse"></i></div>
                                                <div class="modal-content text-center mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                                                    <h3 class="text-lg font-medium text-gray-900">Agregar areas</h3>
                                                    <div class="modal-text">
                                                        <form action="{{ route('area.store') }}" method="post">
                                                          @csrf
                                                            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
                                                            <div class="-mx-3 md:flex mb-6">
                                                                  <div class="md:w-full px-3">
                                                                    <label class="uppercase tracking-wide text-black text-xs font-bold mb-2" for="application-link">
                                                                      Nombre
                                                                    </label>
                                                                    <input class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="application-link" name="name" type="text" placeholder="Nombre">
                                                                  </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-actions bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                            <button id="closeModal" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-md px-4 py-2 bg-sky-400 font-medium text-gray-50 hover:bg-gray-700 hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"><i class="fa fa-plus"></i>Agregar</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<script src="/js/js-admin.js"></script>
</body>

</html>
