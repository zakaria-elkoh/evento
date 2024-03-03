@include('layouts.header')
{{-- @include('layouts.nav') --}}
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

@include('layouts.aside')

<div class="p-4 sm:ml-64 bg-[#eceef2]">
    <div class="p-4 border-2 border-gray-300 border-dashed rounded-lg">
        <div class="overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="font-bold text-3xl mb-5 ml-4 text-gray-700">Statistics</h1> 

            <div class="relative p-4 overflow-x-auto sm:rounded-lg">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    <!-- statistic of the Events -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_reservations }}</h1>
                        <span>Reservation</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Reservations</a>
                    </div>
                    <!-- statistic of the wikis -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_events }}</h1>
                        <span>Event</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Events</a>
                    </div>
                    <!-- statistic of the users -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_users }}</h1>
                        <span>User</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Users</a>
                    </div>
                    
                    <!-- statistic of the tags -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">55</h1>
                        <span>Tags</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Tags</a>
                    </div>
                    <!-- statistic of the categories -->
                    <div class="bg-white p-6 shadow-lg border text-gray-800 rounded-2xl text-center">
                        <h1 class="inline mb-4 text-5xl font-extrabold leading-none tracking-tight">{{ $total_categories }}</h1>
                        <span>Category</span>
                        <a href="#" class="block w-fit ml-auto mt-6 hover:underline">See All Categories</a>
                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>