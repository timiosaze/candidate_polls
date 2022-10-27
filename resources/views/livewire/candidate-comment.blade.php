<div class="max-w-screen-md mx-auto px-4 sm:px-0 py-12 ">
    <h3 class="mb-6 font-extrabold text-lg dark:text-white text-center">Candidate Comments</h3>
    <form wire:submit.prevent='submit' action="{{ route('store_pollb')}}" method="POST">
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