<x-guest-layout>
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-lg px-4 py-8 mx-auto lg:py-16">
            <h2 class="text-lg font-extrabold mb-6 text-center dark:text-white">
                States Winning Percent
            </h2>
            <livewire:states-poll :states="$states"/>
        </div>
    </section>
</x-guest-layout>