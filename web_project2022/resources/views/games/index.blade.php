<x-base-layout>
    <x-slot name="head">
        <!-- must include -->
    </x-slot>
    <!--MAIN CONTENT-->
    <div class="grid grid-cols-12 h-auto">

        <!-----   SEARCH BAR START -------->
        <div class="pt-4 text-center col-start-6 col-end-9">
            <div>      
                <form type="get" action="{{ url('/games/search') }}">   
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="search" id="default-search" name="nameToSearch" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="Search...">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <!-----   SEARCH BAR END -------->
        <div class="col-start-1 col-end-13">
            <div class="grid grid-cols-3 gap-1 p-4">
                
                @foreach($games as $row)
                <a href="/game/{{ $row['id'] }}">
                    <div class="m-4 bg-[url('/images/background_green_symbols.png')] rounded-3xl shadow overflow-hidden">
                        <img src="/images/{{ $row['game_path'] }}/thumbnail.png">
                        <div  class="p-4">
                            <div class="text-sm font-semibold">{{ $row['name'] }}</div>
                        </div>
                        <div class="px-4 py-2">{{ $row['short_desc'] }}</div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
    
</x-base-layout>