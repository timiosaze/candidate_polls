<div class="max-w-screen-xl mx-auto pt-16 pb-12 px-4">
    <div @class(['hidden' => $currentStep != 1])>
        <form wire:submit.prevent='first' action="#" method="POST">
            <h3 class="text-2xl mb-16 font-extrabold text-center dark:text-white">
                Choose Candidate
            </h3>
            <div class="flex flex-row flex-wrap justify-between gap-6 mb-8 items-center">
                @foreach ($candidates as $person)
                
                    <div @class(['focused flex rounded-lg flex-row gap-2 drop-shadow-md items-center p-3  mx-auto sm:mx-0 bg-white hover:ring-primary-700 hover:ring-4 ring-offset-2 cursor-pointer dark:bg-gray-800 dark:text-white h-36 w-60', 'ring-4 ring-primary-800' => $person->id == $candidate_id])  wire:click="set({{$person->id}})">
                        <img src="{{$person->getMedia('candidate')[0]->getUrl()}}" alt="" class="rounded-lg h-full object-cover">
                        <div class="flex flex-col items-start gap-4">
                            <p class="tracking-widest font-thin">{{ $person->party->name }}</p>
                            <p class="font-extrabold text-sm">{{ $person->name }}</p>
                            <p class="flex text-gray-400 text-xs font-bold items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                </svg>
                                {{ $person->user()->where('candidate_id', $person->id)->count() }}
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
    <div @class(['hidden' => $currentStep != 2])>
        <div>
            <h3 class="mb-6 font-extrabold text-lg dark:text-white text-center">Candidate Comments</h3>
            <form wire:submit.prevent='second' action="" method="POST">
                @csrf
            
                <label for="message" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-100">Your comment</label>
                <textarea id="message" rows="4" name="comment" wire:model="comment" class="mb-6 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your message..."></textarea>
                
                <label for="message" class="block mb-2 text-base font-semibold text-gray-900 dark:text-gray-100">His achievement</label>
                <textarea id="message" rows="4" name="achievement" wire:model="achievement" class="mb-6 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your message..."></textarea>
            
                <button type="submit"
                    class="inline-flex float-right items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                    Save 
                </button>
                <div class="clear-right"></div>
            </form>
        </div>
    </div>
    <div x-data="states" @class(['hidden' => $currentStep != 3])>
        <h2 class="text-lg font-extrabold mb-6 text-center dark:text-white">
            States Winning Percent
        </h2>
        <form wire:submit.prevent='submit' action="#" method="POST">
            @csrf
            <div class="mb-6 grid xl:grid-cols-2 sm:grid-cols-1 gap-10">
                @foreach ($states as $state)
               
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="default-range" @class([
                                'block mb-2 text-base',
                                'text-primary-600 dark:text-primary-600 font-bold' => $state['value'] > 50,
                                'font-medium text-gray-900 dark:text-gray-300' => $state['value'] == 50,
                                'text-red-500 dark:text-red-500 font-bold' => $state['value'] < 50,
                            ])>{{$state['state'].": ".$state['value']."%"}} </label>
                            <button type="button" wire:click="showModal('{{ $loop->index }}')"  class="text-xs font-bold text-primary-600">Reason?</button>
                        </div>
                        <input id="default-range" name="user_prediction[]" wire:model="states.{{ $loop->index }}.value" type="range" class="w-full h-2 slider bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700">
                    </div>
                   
                @endforeach
    
                <x-modal.card title="Save comment" blur wire:model.defer="cardModal">
                    <form action="">
                        <div class="grid grid-cols-1 gap-4">
                            <x-textarea wire:model="reasons.{{ $selectedState }}" label="Your Reason?" placeholder="reason" />
                        </div>
                    
                        <x-slot name="footer">
                            <div class="flex justify-between gap-x-4">
                                <div class="flex">
                                    <x-button flat type="button" label="Cancel" x-on:click="close" />
                                    <x-button primary type="button" label="Save" wire:click="save" />
                                </div>
                            </div>
                        </x-slot>
                    </form>
                </x-modal.card>
                
            </div>
            <button wire:click="submit()"
                class="inline-flex float-right items-center py-2.5 px-4 mb-10 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Save Poll
            </button>
            <div class="clear-right"></div>
        </form>
    </div>
</div>
