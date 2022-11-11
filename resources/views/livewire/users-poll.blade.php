<div>
    <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">
        <div>
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs sm:text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                <span class="sr-only">Action button</span>
                Choose Party
                <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li class="flex items-center mb-4 px-4 pt-4">
                            <input id="default-radio-1" type="radio" value="" name="default-radio" wire:click="checkbox(1)" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">APC</label>
                    </li>
                    <li class="flex items-center mb-4 px-4">
                            <input id="default-radio-2" type="radio" value="" wire:click="checkbox(2)" name="default-radio" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">PDP</label>
                    </li>
                    <li class="flex items-center mb-4 px-4">
                            <input id="default-radio-1" type="radio" value="" name="default-radio" wire:click="checkbox(3)" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">LP</label>
                    </li>
                    <li class="flex items-center mb-4 px-4">
                            <input  id="default-radio-2" type="radio" value="" wire:click="checkbox(4)" name="default-radio" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">NNPP</label>
                    </li>
                    <li class="flex items-center mb-4 px-4">
                            <input id="default-radio-1" type="radio" value="" name="default-radio" checked="" wire:click="checkbox(0)" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="default-radio-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Cancel All</label>
                    </li>
                </ul>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative block sm:inline-block ml-2">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search-users" wire:model="search" class="block p-2 pl-10 w-80 text-xs sm:text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search for user">
        </div>
    </div>
    <div class="overflow-x-auto w-full relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 overflow-hidden text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                States Poll
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of {{ $users->total() }} Users Poll</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-12 py-3 px-4">
                        Name
                    </th>
                    <th scope="col" class="w-12 py-3 px-4">
                        Party
                    </th>
                    <th scope="col" class="w-12 py-3 px-4">
                        Candidate
                    </th>
                    @foreach ($states as $state)
                        
                    <th scope="col" class="w-12 py-3 px-4 whitespace-nowrap">
                        {{$state->state}}
                    </th>

                    @endforeach

                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="bg-white border-b text-xs dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$user->name}}
                        
                    </th>
                    <td class="w-12 py-3 px-4">
                        {{$user->candidate->party->name}}
                    </td>
                    <td class="py-3 px-4 whitespace-nowrap dark:text-white">
                        {{$user->candidate->name}}
                    </td>
                    @foreach ($user->predictions as $prediction)
                        
                    <td class="w-12 py-3 px-4">
                        <button type="button" data-popover-target="{{$prediction->id}}" class="w-full h-full">{{$prediction->user_prediction}}</button>
                        <div data-popover id="{{$prediction->id}}" role="tooltip" class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                            <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Reason?</h3>
                            </div>
                            <div class="py-2 px-3">
                                <p>{{$prediction->reason}}</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                    </td>
                    
                    @endforeach

                </tr>
                @endforeach

                <livewire:user-poll-modal />                
            </tbody>
        </table>
    </div>
    <div class="py-8 mx-auto">
        {{ $users->links() }}
    </div>

</div>
