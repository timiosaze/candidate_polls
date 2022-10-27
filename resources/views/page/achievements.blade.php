<x-guest-layout>
    <section class="bg-white dark:bg-gray-900 h-screen">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-20 lg:px-6">
        <div class="mx-auto max-w-screen-sm mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Achievements</h2>
            <a href="{{ route('achievements') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-xs px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Random (10)</a>
            <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400"></p>
        </div> 
        <div id="testimonial-carousel" class="relative" data-carousel="static">
            <div class="overflow-x-hidden overflow-y-visible relative mx-auto max-w-screen-md h-52 rounded-lg sm:h-48">
                @foreach ($achievements as $achievement)
                    
                <figure class="hidden mx-auto w-full max-w-screen-md" data-carousel-item>
                    <blockquote>
                        <p class="text-lg font-normal text-gray-900 sm:text-xl dark:text-white">"{{$achievement->achievement}}"</p>
                    </blockquote>
                    <figcaption class="flex justify-center items-center mt-6 space-x-3">
                        <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="profile picture">
                        <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                            <div class="pr-3 font-medium text-gray-900 dark:text-white">{{$achievement->user->name}}</div>
                            <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">{{$achievement->user->candidate->party->name}}</div>
                        </div>
                    </figcaption>
                </figure>

                @endforeach
            </div>
            <div class="flex justify-center items-center">
                <button type="button" class="flex justify-center items-center mr-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        <span class="hidden">Previous</span>
                    </span>
                </button>
                <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="hidden">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    </section>
</x-guest-layout>