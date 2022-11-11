<form wire:submit.prevent="submit" action="#" class="flex mt-4 ml-0 w-full sm:mt-0 sm:ml-5">
    <div class="relative w-full">
        <label for="email-subscribe" class="hidden mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email address</label>
        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
            </svg>
        </div>
        <input type="email" wire:model.defer="email" id="email-subscribe" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-l-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your email">
        @error('email')
            <span class="text-red-600 ml-2 text-xs font-medium">{{ $message }}</span>   
        @enderror
    </div>
    <button type="submit" class="py-3 px-5 text-sm text-center text-white rounded-r-lg border cursor-pointer bg-primary-600 border-primary-600 hover:bg-primary-700 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Subscribe</button>
</form>
