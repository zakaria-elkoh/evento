@include('layouts.header')
@include('layouts.nav')


<section class="py-20 px-3 md:px-6 mt-20">

    {{-- message alert --}}
    @if(Session::has('message') || Session::has('warning'))
        <div id="alert-3" class="message-alert fixed top-28 right-5 lg:right-32 border border-{{Session::get('message')? 'green' : 'yellow';}}-300 max-w-88 z-50 flex items-center shadow-md hover:shadow-lg p-4 mb-4 text-{{Session::get('message')? 'green' : 'yellow';}}-800 rounded-lg bg-{{Session::get('message')? 'green' : 'yellow';}}-100" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm pr-4 font-medium">
                {{ Session::get('message') }}
                {{ Session::get('warning') }}
            </div>
            <button type="button" class="ms-auto shadow -mx-1.5 -my-1.5 bg-{{Session::get('message')? 'green' : 'yellow';}}-50 text-{{Session::get('message')? 'green' : 'yellow';}}-500 rounded-lg focus:ring-2 focus:ring-{{Session::get('message')? 'green' : 'yellow';}}-400 p-1.5 hover:bg-{{Session::get('message')? 'green' : 'yellow';}}-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="max-w-screen-xl mx-auto flex justify-between mb-4">
        <h2 class="font-bold text-3xl text-gray-800">{{ $event->title }}:</h2>
        {{-- <select id="default" class="bg-gray-50 border shadow hover:shadow-md cursor-pointer border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            <option selected>Choose a Category</option>  
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select> --}}
    </div>
    
    <div class="max-w-screen-xl relative overflow-hidden mx-auto flex gap-4">
        {{-- @foreach ($events as $event)
            <a href="#" class="bg-white relative overflow-hidden border border-gray-200 rounded-xl shadow hover:shadow-xl">
                <div>
                    <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2016/11/23/15/48/audience-1853662_640.jpg" alt="" />
                </div>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $event->title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 ">{{ $event->description }}</p>
                    <p class="text-gray-500">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        @if ($event->price == 0)
                            <span class="text-2xl font-bold text-gray-900 ml-3">Free</span>
                        @else
                            Start At
                            <span class="text-2xl font-bold text-gray-900"> {{ $event->price }} </span>MAD
                        @endif
                    </p>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $event->location }}</span>
                        <span class="{{(($event->total_places - $event->total_reservations) <= 0)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> {{ $event->total_places - $event->total_reservations }} Left</span>
                    </div>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-calendar"></i> {{ $event->date }}</span>
                        <span><i class="fa-solid fa-clock"></i> {{ $event->duration }} (Mins) </span>
                    </div>
                    <p class="absolute top-8 left-[-58px] text-white font-bold bg-blue-600 px-20 py-2 rotate-[-45deg]">{{ $event->category->title }}</p>
                </div>
            </a>
        @endforeach --}}
        
        {{-- <a href="#" class="bg-white border border-gray-200 rounded-xl hover:shadow-md">
            <div>
                <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2016/11/23/15/48/audience-1853662_640.jpg" alt="" />
            </div>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                
            </div>
        </a> --}}

        <div class=" w-2/3">
            <img class="rounded-lg w-full" src="{{ $event->getFirstMediaUrl('images') }}" alt="img" />
        </div>
        <div class="bg-gray-200 rounded-lg shadow-xl w-1/3">
            <div class="p-5 ">
                <h5 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 ">{{ $event->title }}</h5>
                <p class="mb-3 font-normal text-gray-700 ">{{ $event->description }}</p>
                <p class="text-gray-500 mt-6">
                    <i class="fa-solid fa-money-bill-1-wave"></i>
                    @if ($event->price == 0)
                        <span class="text-2xl font-bold text-gray-900 ml-3">Free</span>
                    @else
                        Start At
                        <span class="text-2xl font-bold text-gray-900"> {{ $event->price }} </span>MAD
                    @endif
                </p>
                <div class="flex justify-between my-4 text-gray-500">
                    <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $event->location }}</span>
                    <span class="{{($event->total_places == $event->total_reservations)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> {{ $event->total_places - $event->total_reservations }} Left</span>
                </div>
                <div class="flex justify-between my-4 mb-14 text-gray-500">
                    <span><i class="fa-solid fa-calendar"></i> {{ $event->date }}</span>
                    <span><i class="fa-solid fa-clock"></i> {{ $event->duration }} (Mins) </span>
                </div>
                <p class="absolute top-14 left-[-68px] rotate-[-45deg] text-white font-bold text-xl bg-blue-600 px-24 py-4">{{ $event->category->title }}</p>
                @if ($event->total_places == $event->total_reservations)
                    <a class="text-white cursor-not-allowed block bg-red-700 hover:bg-red-800 text-center focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-6 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Souled out</a>  
                @else
                    @if (Auth::user()->events->contains($event))
                        <a href="{{ route('user.events.reserve', $event->id) }}" class="text-white text-center block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-6 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Already Booked</a>  
                    @else
                        <a href="{{ route('user.events.reserve', $event->id) }}" class="text-white text-center block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 mt-6 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Book Now</a>
                    @endif
                @endif
            </div>
        </div>

    </div>

    <div class="max-w-screen-xl py-24 mx-auto">
        <h2 class="font-bold text-3xl text-gray-800 mb-6">Recent Events:</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($recent_eventes as $event)
                <a href="{{route('show.event', $event->id)}}" class="bg-white relative overflow-hidden border border-gray-200 rounded-xl shadow hover:shadow-xl">
                    <div>
                        <img class="rounded-t-lg" src="{{$event->getFirstMediaUrl('images')}}" alt="" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $event->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 ">{{ $event->description }}</p>
                        <p class="text-gray-500">
                            <i class="fa-solid fa-money-bill-1-wave"></i>
                            @if ($event->price == 0)
                                <span class="text-2xl font-bold text-gray-900 ml-3">Free</span>
                            @else
                                Start At
                                <span class="text-2xl font-bold text-gray-900"> {{ $event->price }} </span>MAD
                            @endif
                        </p>
                        <div class="flex justify-between my-4 text-gray-500">
                            <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $event->location }}</span>
                            <span class="{{(($event->total_places - $event->total_reservations) <= 0)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> {{ $event->total_places - $event->total_reservations }} Left</span>
                        </div>
                        <div class="flex justify-between my-4 text-gray-500">
                            <span><i class="fa-solid fa-calendar"></i> {{ $event->date }}</span>
                            <span><i class="fa-solid fa-clock"></i> {{ $event->duration }} (Mins) </span>
                        </div>
                        <p class="absolute top-8 left-[-58px] text-white font-bold bg-blue-600 px-20 py-2 rotate-[-45deg]">{{ $event->category->title }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</section>



@include('layouts.footer')

<script src="js/alert.js"></script>