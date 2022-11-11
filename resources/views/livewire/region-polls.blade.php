<div class="overflow-x-auto my-10 relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <caption class="p-5 overflow-hidden text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Regions Poll
            <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and more.</p>
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Party
                </th>
                <th scope="col" class="py-3 px-6">
                        Candidate
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        South East 
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        North East
                    
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                   
                        South South
                       
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                        North Central
                   
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                    
                        South West
                       
                </th>
                <th scope="col" class="py-3 px-6 whitespace-nowrap">
                    
                        North West
                       
                </th>
            </tr>
        </thead>
        <tbody>
                
            <tr class="bg-white border-b text-xs dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach ($predictions["Asiwaju Bola Tinubu"] as $zone)

                    @if ($loop->first)
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->fullname}}
                        </th>
                        <td  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->name}}
                        </td>
                    @endif
                    <td class="py-4 px-6">
                        {{ number_format((int) $zone->total / $zone->count , 2) . "%" }}
                    </td>
                @endforeach
            </tr>
            <tr class="bg-white border-b text-xs dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach ($predictions["Atiku Abubakar"] as $zone)

                    @if ($loop->first)
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->fullname}}
                        </th>
                        <td  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->name}}
                        </td>
                    @endif
                    <td class="py-4 px-6">
                        {{ number_format((int) $zone->total / $zone->count , 2) . "%" }}
                    </td>
                @endforeach
            </tr>
            <tr class="bg-white border-b text-xs dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach ($predictions["Dr Rabiu Kwankwaso"] as $zone)

                    @if ($loop->first)
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->fullname}}
                        </th>
                        <td  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->name}}
                        </td>
                    @endif
                    <td class="py-4 px-6">
                        {{ number_format((int) $zone->total / $zone->count , 2) . "%" }}
                    </td>
                @endforeach
            </tr>
            <tr class="bg-white border-b text-xs dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                @foreach ($predictions["Peter Gregory Obi"] as $zone)

                    @if ($loop->first)
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->fullname}}
                        </th>
                        <td  class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$zone->name}}
                        </td>
                    @endif
                    <td class="py-4 px-6">
                        {{ number_format((int) $zone->total / $zone->count , 2) . "%" }}
                    </td>
                @endforeach
            </tr>

        </tbody>
    </table>
</div>
