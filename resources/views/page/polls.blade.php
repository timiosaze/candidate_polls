<x-guest-layout>
    <section class=" w-full dark:bg-gray-900 h-full px-4 sm:px-0">
        <div class="mx-auto max-w-screen-lg pt-16">
            
            <livewire:users-poll :states="$states" />
            <livewire:region-polls :predictions="$predictions" />
        </div>
    <div class="mx-auto max-w-screen-lg py-8">
        <a href="{{ route('more_polls') }}" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">View more</a>

    </div>
    </section>
</x-guest-layout>