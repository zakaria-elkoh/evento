@include('layouts.header')
@include('layouts.nav')

{{-- @dd(Auth::user()->roles) --}}

<div class="relative mt-20 flex flex-col-reverse py-16 lg:pt-0 lg:flex-col lg:pb-0">
    <div class="inset-y-0 top-0 right-0 z-0 w-full max-w-xl px-4 mx-auto md:px-0 lg:pr-0 lg:mb-0 lg:mx-0 lg:w-7/12 lg:max-w-full lg:absolute xl:px-0">
      <svg class="absolute left-0 hidden h-full text-white transform -translate-x-1/2 lg:block" viewBox="0 0 100 100" fill="currentColor" preserveAspectRatio="none slice">
        <path d="M50 0H100L50 100H0L50 0Z"></path>
      </svg>
      <img
        class="object-cover w-full h-56 rounded shadow-lg lg:rounded-none lg:shadow-none md:h-96 lg:h-full"
        src="imgs/event.jpg"
        alt="img"
      />
    </div>
    <div class="relative flex flex-col items-start w-full max-w-xl px-4 mx-auto md:px-0 lg:px-8 lg:max-w-screen-xl">
      <div class="mb-16 lg:my-40 lg:max-w-lg lg:pr-5">
        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-teal-accent-400">
          Event new
        </p>
        <h2 class="mb-5 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-6xl sm:leading-none">
          Everything you<br class="hidden md:block" />
          can imagine
          <span class="inline-block text-deep-purple-accent-400">is real</span>
        </h2>
        <p class="pr-5 mb-5 lg:pb-10 text-base text-gray-700 md:text-lg">
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
        </p>
        @guest
            <div class="flex items-center">
                <a href="{{route('register')}}" class="text-white hover:shadow-lg bg-blue-700 focus:outline-none hover:bg-blue-800 focus:ring-4 font-bold rounded-full text-sm px-8 py-3 me-2 mr-8">Get Started</a>
            </div>
        @endguest
      </div>
    </div>
</div>



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

    {{-- show categories --}}
    <div class="max-w-screen-xl mx-auto flex justify-between mb-4">
        <h2 class="font-bold text-3xl text-gray-800">Up Coming Events:</h2>
        <div class="flex items-start gap-5 flex-grow">
            <div class="relative max-w-md shadow mx-auto mb-16 flex-grow hover:shadow-md rounded-lg">
                <input type="search" id="search-input" class="block w-full p-4 ps-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search..." required />
                <button type="submit" id="search-btn" name="search" class="text-white absolute end-2.5 bottom-2.5 shadow-sm bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
            <select id="select-category" class="bg-gray-50 border shadow hover:shadow-md cursor-pointer border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                <option value="all" selected>All</option>  
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- show events --}}
    <div class="categories_wrapper my-16 relative max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($events as $event)
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
                            <span class="text-2xl font-bold text-gray-900"> {{ $event->price }} </span>DH
                        @endif
                    </p>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $event->location }}</span>
                        <span class="{{(($event->total_places - $event->total_reservations) <= 0)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> {{ $event->total_places - $event->total_reservations }} Left</span>
                    </div>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-calendar"></i> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y H:i') }}</span>
                        <span><i class="fa-solid fa-clock"></i> {{ $event->duration }} (Mins) </span>
                    </div>
                    <p class="absolute top-8 left-[-58px] text-white font-bold bg-blue-600 px-20 py-2 rotate-[-45deg]">{{ $event->category->title }}</p>
                </div>
            </a>
        @empty
            <h1></h1>
            <h1 class="mb-4 text-2xl text-center font-extrabold leading-none tracking-tight text-gray-600 md:text-3xl lg:text-4xl">Not Found</h1>
        @endforelse
        
        <div class="flex justify-center w-full mt-8 mx-auto">
            {{ $events->links('pagination::tailwind') }}
        </div>
    </div>
    
</section>





@include('layouts.footer')

<script src="js/index.js"></script>
<script src="js/alert.js"></script>