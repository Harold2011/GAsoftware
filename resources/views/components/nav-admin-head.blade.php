<nav aria-label="menu nav" class="bg-gray-100 z-0 z-20 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full top-0">

    <div class="flex flex-wrap items-center">
        <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
            <a href="{{ route ('dashboard') }}" aria-label="Home">
                <img class="h-14" src="{{ asset('storage/img/logo.png') }}" alt="logo" />
            </a>
        </div>

        <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-current px-2">
            
        </div>

        <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
            <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="flex-1 md:flex-none md:mr-3">
                    <div class="relative inline-block">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="inline-block py-2 px-4 text-current no-underline" type="submit"><i class="fas fa-sign-out-alt fa-fw"></i>Cerrar sesión</button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>