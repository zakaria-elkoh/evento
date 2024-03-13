
<nav class="bg-[#f7f8fc] border-b shadow z-50 border-gray-200 fixed top-0 left-0 w-full">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-6">
        <!-- the logo -->
        <a href={{ route('home') }} class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl text-black font-bold whitespace-nowrap">Eve<span class="text-blue-700">nto</span>.</span>
        </a>
     
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- the links -->
        <div class="hidden grow w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium text-center flex flex-col justify-end items-center px-4 py-10 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                <li>
                    <a href="/" class="text-black font-bold block py-2 px-3 bg-blue-700 hover:text-blue-400 rounded md:bg-transparent md:p-0 " >Home</a>
                </li>
                @auth
                    @can('isUser') 
                        <li>
                            <a href="{{route('my.reservations')}}" class="text-black block mb-8 md:mb-0 py-2 px-3 rounded hover:text-blue-400 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">My Reservations</a>
                        </li>
                    @endcan
                    @can('isOrganizerOrAdmin') 
                        <li>
                            <a href="{{route('admin.dashboard.statistic')}}" class="text-black block mb-8 md:mb-0 py-2 px-3 rounded hover:text-blue-400 hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0">Dashboard</a>
                        </li>
                    @endcan
                    @can('isOrganizer')
                        <li>
                            <a href="{{route('organizer.events.create')}}" class="text-black font-bold block py-2 px-3 rounded md:border-0 md:p-0">Add An Event</a>
                        </li>
                    @endcan
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="text-white hover:shadow-md bg-red-700 focus:outline-none hover:bg-red-800  font-bold rounded-full text-sm px-4 py-2.5">Log out</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{route('login')}}" class="text-black font-bold block py-2 px-3 rounded md:border-0 md:p-0">Sign In</a>
                    </li>
                    <li>
                        <a href="{{route('register')}}" class="text-white hover:shadow-md bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-bold rounded-full text-sm px-4 py-2.5 me-2 mb-2">Get Started</a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>