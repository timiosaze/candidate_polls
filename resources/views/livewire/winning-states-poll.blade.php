<div class="mx-auto max-w-screen-lg pt-16 px-4 sm:px-0">
    <div class="overflow-x-auto  relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 overflow-hidden text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Winning States  Poll
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">List of {{ $winnings->total() }} Users Poll</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        
                        <button  @class([
                            'flex items-center uppercase',
                            'text-primary-600' => $sortField == 'name',
                        ]) wire:click="sort('name')">
                            User name
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            @class([
                                'ml-1 w-3 h-3',
                                'text-primary-600' => $sortField == 'name',
                            ])
                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <button 
                        @class([
                            'flex items-center uppercase',
                            'text-primary-600' => $sortField == 'candidate',
                        ])
                        wire:click="sort('candidate')">
                            Candidate
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            @class([
                                'ml-1 w-3 h-3',
                                'text-primary-600' => $sortField == 'candidate',
                            ])
                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            Party
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        <button  @class([
                            'flex items-center uppercase',
                            'text-primary-600' => $sortField == 'count',
                        ]) wire:click="sort('count')">
                            States Count
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            @class([
                                'ml-1 w-3 h-3',
                                'text-primary-600' => $sortField == 'count',
                            ])
                            aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                        </button>
                    </th>
                    <th scope="col" class="py-3 px-6">
                     States
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($winnings as $each)
                    
                <tr class="bg-white text-xs border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$each->name}}
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$each->candidate}}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$each->party}}
                    </td>
                    <td class="py-4 px-6">
                        {{$each->count}}
                    </td>
                    @php
                        $array = [];
                        foreach ($states as $state){
                            if($state->name == $each->name){
                                array_push($array, $state->state);
                            }
                        }
                    @endphp
                    <td class="py-4 px-6 w-1/3">
                        {{implode(", ", $array) }}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-8 mx-auto">
        {{ $winnings->links() }}
    </div>
</div>