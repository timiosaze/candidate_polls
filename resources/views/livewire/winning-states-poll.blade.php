<div class="mx-auto max-w-screen-lg pt-16 px-4 sm:px-0">
    <div class="overflow-x-auto  relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <caption class="p-5 overflow-hidden text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                Winning States  Poll
                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        User name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            Candidate
                            <button wire:click="sortBy('candidate')">
                                <svg xmlns="http://www.w3.org/2000/svg" 
                                @class([
                                    'ml-1 w-3 h-3',
                                    'text-primary-600' => $sortField == 'candidate',
                                ])
                                aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            Party
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        <div class="flex items-center">
                            Winning States Count
                            <button wire:click="sortBy('count')">  
                                <svg xmlns="http://www.w3.org/2000/svg"
                                @class([
                                    'ml-1 w-3 h-3',
                                    'text-primary-600' => $sortField == 'count',
                                ])
                                aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg>
                            </button>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                    Winning States
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userchoice as $each)
                    
                <tr class="bg-white text-xs border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$each['name']}}
                    </th>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$each['candidate']}}
                    </td>
                    <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$each['party']}}
                    </td>
                    <td class="py-4 px-6">
                        {{$each['count']}}
                    </td>
                    <td class="py-4 px-6 w-64">
                        {{implode(',', $each['wins'])}}
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-8 mx-auto">
        {{ $userchoice->links() }}
    </div>
</div>