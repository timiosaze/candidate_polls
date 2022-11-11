<form wire:submit.prevent="submit" action="{{ route('contact_store') }}" class="grid grid-cols-1 gap-8 p-6 mx-auto mb-16 max-w-screen-md bg-white rounded-lg border border-gray-200 shadow-sm lg:mb-28 dark:bg-gray-800 dark:border-gray-700 sm:grid-cols-2" method="POST">
    @csrf
    <div>
        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name</label>
        <input type="text" id="first-name" name="firstName" wire:model.defer="firstname" class="@error('firstName') dark:border-red-600 border-red-600 @enderror block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="First name">
        @error('firstname')
            <span class="text-red-600 ml-2 text-xs font-medium">{{ $message }}</span>   
        @enderror
    </div>
    <div>
        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name</label>
        <input type="text" id="last-name" name="lastName" wire:model.defer="lastname" class="@error('lastName') dark:border-red-600 border-red-600 @enderror block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Last name" >
        @error('lastname')
            <span class="text-red-600 ml-2 text-xs font-medium">{{ $message }}</span>   
        @enderror
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
        <input type="email" id="email" name="email" wire:model.defer="email"  class="@error('email') dark:border-red-600 border-red-600 @enderror shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@gmail.com" >
        @error('email')
            <span class="text-red-600 ml-2 text-xs font-medium">{{ $message }}</span>   
        @enderror
    </div>
    <div>
        <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone Number <small>(optional)</small></label>
        <input type="text" id="phone-number" wire:model.defer="phoneNumber"  name="phonenumber" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="081********">
    </div>
    <div class="sm:col-span-2">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
        <textarea id="message" name="body" rows="6" wire:model.defer="body"  class="@error('body') dark:border-red-600 border-red-600 @enderror block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
        @error('body')
            <span class="text-red-600 ml-2 text-xs font-medium">{{ $message }}</span>   
        @enderror
    </div>
    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button>
</form>
