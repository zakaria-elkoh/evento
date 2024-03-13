@include('layouts.header')
@include('layouts.nav')



<section class="py-20 px-3 md:px-6">
    
    {{-- message alert --}}
    @if(Session::has('message'))
        <div id="alert-3" class="message-alert fixed top-28 right-5 lg:right-32 border border-green-300 max-w-88 z-50 flex items-center shadow-md hover:shadow-lg p-4 mb-4 text-green-800 rounded-lg bg-green-100" role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div class="ms-3 text-sm pr-4 font-medium">
                {{ Session::get('message') }}
            </div>
            <button type="button" class="ms-auto shadow -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif


    {{-- show events --}}
    <div class="max-w-screen-xl mx-auto my-16">
        <h2 class="font-bold text-3xl mb-6 text-gray-800">The Events I reserved to:</h2>
        <div class="categories_wrapper relative max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($reservations as $reservation)
                <a href="{{route('show.event', $reservation->event->id)}}" class="bg-white relative overflow-hidden border border-gray-200 rounded-xl shadow hover:shadow-xl">
                    <div>
                        <img class="rounded-t-lg" src="{{$reservation->event->getFirstMediaUrl('images')}}" alt="img" />
                    </div>
                    <div class="p-5">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $reservation->event->title }}</h5>
                        <p class="mb-3 font-normal text-gray-700 ">{{ $reservation->event->description }}</p>
                        <p class="text-gray-500">
                            <i class="fa-solid fa-money-bill-1-wave"></i>
                            @if ($reservation->event->price == 0)
                                <span class="text-2xl font-bold text-gray-900 ml-3">Free</span>
                            @else
                                Start At
                                <span class="text-2xl font-bold text-gray-900"> {{ $reservation->event->price }} </span>DH
                            @endif
                        </p>
                        <div class="flex justify-between my-4 text-gray-500">
                            <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $reservation->event->location }}</span>
                            <span class="{{(($reservation->event->total_places - $reservation->event->total_reservations) <= 0)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> {{ $reservation->event->total_places - $reservation->event->total_reservations }} Left</span>
                        </div>
                        <div class="flex justify-between my-4 text-gray-500">
                            <span><i class="fa-solid fa-calendar"></i> {{ $reservation->event->date }}</span>
                            <span><i class="fa-solid fa-clock"></i> {{ $reservation->event->duration }} (Mins) </span>
                        </div>
                        <p class="absolute top-8 left-[-58px] text-white font-bold bg-blue-600 px-20 py-2 rotate-[-45deg]">{{ $reservation->event->category->title }}</p>
                    </div>
                </a>
            @empty
                <h1></h1>
                <h1 class="mb-4 text-2xl text-center font-extrabold leading-none tracking-tight text-gray-600 md:text-3xl lg:text-4xl">Not Found</h1>
            @endforelse
        
            <div class="flex justify-center w-full mt-8 mx-auto">
                {{-- {{ $events->links('pagination::tailwind') }} --}}
            </div>
        </div>
    </div>
    
</section>




@include('layouts.footer')

<script src="js/index.js"></script>
<script src="js/alert.js"></script>