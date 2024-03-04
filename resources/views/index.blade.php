@include('layouts.header')
@include('layouts.nav')



<section class="py-20 px-3 md:px-6 mt-20">

    <div class="max-w-screen-xl mx-auto flex justify-between mb-4">
        <h2 class="font-bold text-3xl text-gray-800">Up Coming Events:</h2>
        <div class="flex items-start gap-5 flex-grow">
            <div class="relative max-w-md shadow mx-auto mb-16 flex-grow">
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
    
    <div class="categories_wrapper my-16 relative max-w-screen-xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($events as $event)
            <a href="{{route('show.event', $event->id)}}" class="bg-white relative overflow-hidden border border-gray-200 rounded-xl shadow hover:shadow-xl">
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
        @endforeach
             
        {{-- <a href="#" class="bg-white border border-gray-200 rounded-xl hover:shadow-md">
            <div>
                <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2016/11/23/15/48/audience-1853662_640.jpg" alt="" />
            </div>
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Noteworthy technology acquisitions 2021</h5>
                <p class="mb-3 font-normal text-gray-700 ">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                
            </div>
        </a> --}}

    </div>

</section>





@include('layouts.footer')

<script src="js/index.js"></script>