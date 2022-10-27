<div x-data="states">
    <form wire:submit.prevent='submit' action="#" method="POST">
        @csrf
        <div class="mb-6 grid xl:grid-cols-2 sm:grid-cols-1 gap-10">
            @foreach ($states as $state)
           
                <div>
                    <label for="default-range" @class([
                        'block mb-2 text-base',
                        'text-primary-800 dark:text-primary-800 font-bold' => $state['value'] > 50,
                        'font-medium text-gray-900 dark:text-gray-300' => $state['value'] == 50,
                        'text-red-500 dark:text-red-500 font-bold' => $state['value'] < 50,
                    ])>{{$state['state'].": ".$state['value']."%"}} </label>
                    <input id="default-range" name="user_prediction[]" wire:model="states.{{ $loop->index }}.value" type="range" class="w-full h-2 slider bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                </div>
                 
            @endforeach
        </div>
        <button type="submit"
            class="inline-flex float-right items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Save Poll
        </button>
        <div class="clear-right"></div>
    </form>
</div>