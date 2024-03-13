@include('layouts.header')

<div class="grid place-items-center min-h-screen ">
    <div class="text-center h-fit">
        <h1 class="mb-4 text-6xl font-bold text-red-500">403</h1>
        <p class="my-8 text-lg text-gray-600">Oops! You are banned by the admin.</p>
        <div class="animate-bounce">
          <svg class="mx-auto h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
          </svg>
        </div>
        <p class="mt-4 text-gray-600"> <a href="/" class="text-blue-500">Go back to home</a>.</p>
      </div>
    </div>
</div>