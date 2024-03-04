const selectCategory = document.querySelector('#select-category'),
      searchInput = document.querySelector('#search-input'),
      searchBtn = document.querySelector('#search-btn'),
      categoriesWrapper = document.querySelector('.categories_wrapper');

searchBtn.addEventListener('click', () => {
    console.log(searchInput.value);
    fetchData();
});

const fetchData = () => {

    const url = 'http://127.0.0.1:8000/events?category=' + selectCategory.value + '&title=' + searchInput.value;

    categoriesWrapper.innerHTML = `
        <div role="status" class="mx-auto absolute left-1/2 translate-x-[-50%]">
            <svg aria-hidden="true" class="inline w-16 h-16 text-gray-200 animate-spin dark:text-gray-300 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    `;

    fetch(url)
    .then( res => {
        if(!res.ok) {
          throw Error("can fetch the data from the back-end");
        }
        return res.json();
    })
    .then( events => {
        console.log(events);
        categoriesWrapper.innerHTML = '';
        events.forEach(event => {

            categoriesWrapper.innerHTML += `
            <a href="/events/${event.id}" class="bg-white relative overflow-hidden border border-gray-200 rounded-xl shadow hover:shadow-xl">
                <div>
                    <img class="rounded-t-lg" src="https://cdn.pixabay.com/photo/2016/11/23/15/48/audience-1853662_640.jpg" alt="" />
                </div>
                <div class="p-5">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">${event.title}</h5>
                    <p class="mb-3 font-normal text-gray-700 ">${event.description}</p>
                    <p class="text-gray-500">
                        <i class="fa-solid fa-money-bill-1-wave"></i>
                        <span class="text-2xl font-bold text-gray-900 ml-3">${event.price}</span>
                    </p>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-location-dot mr-1"></i>${event.location}</span>
                        <span class="{{(($event->total_places - $event->total_reservations) <= 0)? 'line-through text-red-500' : '' ;}}"><i class="fa-solid fa-chair"></i> ${event.total_places - event.total_reservations} Left</span>
                    </div>
                    <div class="flex justify-between my-4 text-gray-500">
                        <span><i class="fa-solid fa-calendar"></i> ${event.total_places} </span>
                        <span><i class="fa-solid fa-clock"></i> ${event.duration} (Mins) </span>
                    </div>
                    <p class="absolute top-8 left-[-58px] text-white font-bold bg-blue-600 px-20 py-2 rotate-[-45deg]">${ event.category.title }</p>
                </div>
            </a>              
            `
        });
    })
    .catch( err => {
        console.log(err);
    })
};

selectCategory.addEventListener('change', () => {
    fetchData();
});