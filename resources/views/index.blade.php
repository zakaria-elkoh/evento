@include('layouts.header')
@include('layouts.nav')



<section class="py-20 px-3 md:px-6 mt-20">

    <div class="max-w-screen-xl mx-auto flex justify-between mb-4">
        <h2 class="font-bold text-3xl text-gray-800">Up Coming Events:</h2>
        <select id="default" class="bg-gray-50 border shadow hover:shadow-md cursor-pointer border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            <option selected>Choose a Location</option>  
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="max-w-screen-xl mx-auto grid grid-cols-4 gap-4">
        @foreach ($events as $event)
            <a href="#" class="bg-white border border-gray-200 rounded-xl shadow hover:shadow-xl">
                <div>
                    <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2016/11/23/15/48/audience-1853662_640.jpg" alt="" />
                </div>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">{{ $event->title }}</h5>
                    <p class="mb-3 font-normal text-gray-700 ">{{ $event->description }}</p>
                    <p class="text-gray-500">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        From
                        <span class="text-2xl font-bold text-gray-900">{{ $event->price }} </span>MAD
                    </p>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-location-dot mr-1"></i>{{ $event->location }}</span>
                        <span><i class="fa-solid fa-chair"></i> {{ $event->total_places }} Left</span>
                    </div>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-calendar"></i> {{ $event->date }}</span>
                        <span><i class="fa-solid fa-clock"></i> {{ $event->duration }}</span>
                    </div>
                    {{-- <p class="text-gray-500"></p> --}}
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