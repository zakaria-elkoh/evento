<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto shadow-lg border-r-2 border-gray-200">
        <ul class="space-y-2 font-medium">
            <a href="/" class="flex items-center p-2 text-gray-900 bg-gray-100 hover:bg-gray-200 hover:shadow rounded-lg group">
                <span class="material-symbols-outlined">
                    home
                </span>
                <span class="flex-1 ms-3 whitespace-nowrap">Home</span>
            </a>
            {{-- start the admin aside links --}}
            @can('isAdmin')
                <li class="rounded-lg">
                    <a href={{route('admin.dashboard.events.requests')}}  class="{{Route::is('admin.dashboard.events.requests') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-700 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Events Requests</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href={{route('admin.dashboard.statistic')}} class="{{Route::is('admin.dashboard.statistic') ? 'bg-gray-300' : 'bg-gray-100'}} hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-800 rounded-lg group">
                        <span class="material-symbols-outlined">
                            scatter_plot
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Statistic</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href={{route('admin.dashboard.users.index')}}  class="{{Route::is('admin.dashboard.users.index') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-700 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href={{ route('admin.dashboard.events.index') }} class="{{Route::is('admin.dashboard.events.index') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-700 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Events</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href={{ route('admin.dashboard.categories.index') }} class="{{Route::is('admin.dashboard.categories.index') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-700 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Categories</span>
                    </a>
                </li>
            @endcan
            {{-- end the admin aside links --}}
            {{-- start the organizer aside links--}}
            @can('isOrganizer')
                <li class="rounded-lg">
                    <a href="" class="{{Route::is('rep.dash.company.index') ? 'bg-gray-700' : ''}} bg-gray-100 hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <span class="material-symbols-outlined">
                            scatter_plot
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">Statistic</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href="{{route('organizer.events.index')}}" class="{{Route::is('organizer.events.index') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <span class="material-symbols-outlined">
                            scatter_plot
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Events</span>
                    </a>
                </li>
                <li class="rounded-lg">
                    <a href="" class="{{Route::is('rep.dash.company.index') ? 'bg-gray-700' : ''}} bg-gray-100 hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                        <span class="material-symbols-outlined">
                            scatter_plot
                        </span>
                        <span class="flex-1 ms-3 whitespace-nowrap">My Reservations user</span>
                    </a>
                </li>
            @endcan
            {{-- <li class="rounded-lg">
                <a href={{route('organizer.dashboard.events.requests')}}  class="{{Route::is('organizer.dashboard.events.requests') ? 'bg-gray-300' : 'bg-gray-100'}}  hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-700 transition duration-75 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z"/>
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">My Events Requests</span>
                </a>
            </li> --}}
            {{-- end the organizer aside links--}}
            {{-- <li class="rounded-lg">
                <a href="#" class="{{Route::is('admin.dashboard.trash') ? 'bg-gray-700' : ''}} bg-gray-100 hover:bg-gray-300 hover:shadow flex items-center p-2 text-gray-900 rounded-lg group">
                    <span class="material-symbols-outlined">
                        delete_sweep
                    </span>
                    <span class="flex-1 ms-3 whitespace-nowrap">Trash</span>
                </a>
            </li> --}}
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center p-2 text-gray-900 bg-gray-100 hover:bg-gray-300 hover:shadow rounded-lg w-full group">
                        <svg class="flex-shrink-0 w-5 h-5  text-gray-700 transition duration-75" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                        </svg>
                        <span class="ms-3 whitespace-nowrap">Log out</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</aside>