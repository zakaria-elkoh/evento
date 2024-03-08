@include('layouts.header')
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

@include('layouts.aside')

<div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-300 border-dashed rounded-lg">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="font-bold text-2xl mb-5 ml-4 text-gray-700">My Events</h1> 

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-700 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="p-4">
                                    Title
                                </th>
                                {{-- <th scope="col" class="px-6 py-3">
                                    Description
                                </th> --}}
                                <th scope="col" class="px-6 py-3">
                                    Location
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Date
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Duration
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Places
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Reservations
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr class="bg-gray-100 text-gray-600 border-b hover:bg-gray-200">
                                    <td class="w-4 p-2">
                                        {{ $event->title }}
                                    </td>
                                    {{-- <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                        {{ $event->description }}
                                    </th> --}}
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->location }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->date }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->duration }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->price }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->total_places }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->total_reservations }}
                                    </td>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $event->category->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{route('organizer.events.destroy', $event->id)}}" method="POST">   
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" name="submit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button>
                                        </form>
                                        <a href={{route('organizer.events.edit', $event->id)}} class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        <a href={{route('organizer.dashboard.events.requests', $event->id)}} class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Requests {{$event->id}}</a>
                                        <div>
                                            
                                        {{-- <!-- Modal toggle -->
                                        <button data-modal-target="static-modal" data-modal-toggle="static-modal" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="button">
                                            requests
                                        </button>
                                        
                                        <!-- Main modal -->
                                        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                            <div class="relative p-4 w-full max-w-2xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            All Requests for this event
                                                        </h3>
                                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-4 md:p-5 space-y-4">
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                                                        </p>
                                                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                                                        </p>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                        <button data-modal-hide="static-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                                                        <button data-modal-hide="static-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

        </div>

    </div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>