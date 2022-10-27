<div>
<form wire:submit.prevent='submit' action="#" method="POST">
    <h3 class="text-2xl mb-4 font-extrabold text-center dark:text-white">Choose Candidate</h3>
    <div class="flex flex-row flex-wrap justify-between gap-y-6 mb-8 items-center">
        <input type="text" wire:model="candidate_id">
        @foreach ($candidates as $person)
        
            <div :class="true ? 'ring-4 ring-primary-800' : ''" wire:click="set({{$person->id}})"  class="focused flex rounded-lg flex-row gap-2 drop-shadow-md items-center p-3  mx-auto sm:mx-0 bg-white hover:ring-primary-700 hover:ring-4 ring-offset-2 cursor-pointer dark:bg-gray-800 dark:text-white h-36 w-60">
                <img src="{{$person->getMedia('candidate')[0]->getUrl()}}" alt="" class="rounded-lg h-full object-cover">
                <div class="flex flex-col items-start gap-4">
                    <p class="tracking-widest font-thin">{{ $person->party->name }}</p>
                    <p class="font-extrabold text-sm">{{ $person->name }}</p>
                    <p class="flex text-gray-400 text-xs font-bold items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                        </svg>
                        1234
                    </p>
                </div>
            </div>
            
        @endforeach
    </div>
   
    <button type="submit"
        class="inline-flex float-right items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
        Save Candidate
    </button>
    <div class="clear-right"></div>
</form>
</div>
