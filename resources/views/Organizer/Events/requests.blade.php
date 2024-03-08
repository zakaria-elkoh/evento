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
            <h1 class="font-bold text-2xl m-4 text-gray-700">All Requests For This Event</h1> 

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="p-4">
                                    Profile
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Role
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr class="bg-gray-100 border-b hover:bg-gray-200">
                                    <td class="w-4 p-2">
                                        <img class="w-10 mx-auto h-10 rounded-full" src="https://a.storyblok.com/f/191576/1200x800/faa88c639f/round_profil_picture_before_.webp" alt="Jese image">
                                    </td>
                                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                                        {{ $request->user->name }}
                                    </th>
                                    <td class="px-6 py-4 font-medium">
                                        {{ $request->user->email }}
                                    </td>
                                    <td class="px-6 py-4 font-medium uppercase">
                                        user
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('organizer.dashboard.reservation.accept', $request->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Accept {{$request->id}}</a>
                                        <a href="{{route('organizer.dashboard.reservation.reject', $request->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Reject {{$request->id}}</a>
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