<div class="relative" x-data="{ open: true }" @click.away="open = false">
    <input
        wire:model.debounce.300ms="search"
        type="text"
        class="bg-gray-800 pl-8 text-sm rounded-full focus:outline-none focus:shadow-outline px-3 py-1 w-64"
        placeholder="Search (Press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if(event.keyCode === 111) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="open = true"
        @keydown.escape.window="open = false"
        @keydown="open = true"
        @keydown.shift.tab="open = false">
    <div class="absolute top-0 flex items-center h-full ml-2">
        <svg class="fill-current text-gray-400 w-4" viewBox="0 0 24 24"><path class="heroicon-ui" d="M16.32 14.9l5.39 5.4a1 1 0 01-1.42 1.4l-5.38-5.38a8 8 0 111.41-1.41zM10 16a6 6 0 100-12 6 6 0 000 12z"/></svg>
    </div>

    <svg wire:loading class="animate-spin absolute top-0 right-0 mr-2 mt-1 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>



    @if(strlen($search) >= 2)
        <div
                class="absolute z-50 bg-gray-800 text-xs rounded w-64 mt-2"
                x-show.transition.opacity.duration.200="open"
        >
            @if(count($searchResult)>0)
                <ul>
                    @foreach($searchResult as $game)
                        <li class="border-b border-gray-700">
                            <a
                                    href="{{route('games.show', $game['slug'])}}"
                                    class="block focus:bg-gray-700 hover:bg-gray-700 flex items-center transition ease-in-out duration-150 px-3 py-3"
                                    @if($loop->last) @keydown.tab="open = false" @endif
                            >
                                @if(array_key_exists('cover', $game))
                                    <img src="{{str_replace("thumb", "cover_small", $game['cover']['url'])}}" alt="Cover" class="w-10">
                                @else
                                    <img src="{{asset('img/ff7.jpg')}}" alt="Cover" class="w-10">
                                @endif
                                <span class="ml-4">{{$game['name']}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3">
                    No Result for "{{$search}}".
                </div>
            @endif
        </div>
    @endif
</div>
