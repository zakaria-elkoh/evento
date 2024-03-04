
@include('layouts.header')
@include('layouts.nav')

<form class="p-6 [#f7f8fc] shadow-xl max-w-screen-sm mx-auto mt-32 mb-10 rounded-3xl" action="{{ route('organizer.events.update', $event->id) }}" method="POST">
    @method('PUT')
    @csrf
    <h2 class="text-3xl text-gray-700 font-extrabold mb-16 mt-6 text-center">Create an Event:</h2>
    <div>
        <label for="title" class="block mb-2 text-sm font-medium text-gray-700">Title:</label>
        <input type="text" name="title" value="{{$event->title}}" id="title" class="border shadow border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Event Title">
        @error('title')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="location" class="block mb-2 text-sm mt-5 font-medium text-gray-700 ">Location:</label>
        <input type="text" name="location" value="{{$event->location}}" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event location">
        @error('location')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="date" class="block mb-2 text-sm mt-5 font-medium text-gray-700 ">Date:</label>
        <input type="date" name="date" value="{{$event->date}}" id="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event date">
        @error('date')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="duration" class="block mb-2 text-sm mt-5 font-medium text-gray-700">Duration (Mins):</label>
        <input type="number" name="duration" value="{{$event->duration}}" id="duration" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event duration">
        @error('duration')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="total_places" class="block mb-2 text-sm mt-5 font-medium text-gray-700 ">Total Places:</label>
        <input type="number" name="total_places" value="{{$event->total_places}}" id="total_places" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event total places">
        @error('total_places')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm mt-5 font-medium text-gray-700">Price (DH):</label>
        <input type="text" name="price" value="{{$event->price}}" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event price">
        @error('price')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>
    <div>
        <label for="price" class="block mb-2 text-sm mt-5 font-medium text-gray-700">Category:</label>
        <select id="default" name="category_id" class="bg-gray-50 w-full border shadow cursor-pointer border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            <option selected>Choose a Category</option>                
            @foreach ($categories as $category)
                <option {{ ($category->id == $event->category_id)? 'selected' : ''; }} value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="description" class="block mb-2 text-sm mt-5 font-medium text-gray-700">Description:</label>
        <textarea type="text" name="description" id="description" class="bg-gray-50 border min-h-48 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 shadow" placeholder="Event description">
            {{$event->description}}
        </textarea>
        @error('description')
            <span class="text-red-400">{{$message}}</span>
        @enderror
    </div>

    <button type="submit" name="update" class="text-white block mx-auto bg-blue-700 focus:outline-none hover:bg-blue-800 hover:shadow-xl focus:ring-4 font-medium rounded-full text-sm py-2.5 px-10 mt-12">Create Event</button>
</form>