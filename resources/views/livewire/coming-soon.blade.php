<div wire:init="loadComingSoon"
    class="coming-soon-container space-y-10 mt-8">
    @forelse($comingSoon as $game)
        <div class="game flex">
            <a href="{{route('games.show', ['slug'=> $game['slug']])}}">
                <img src="{{$game['coverImageUrl']}}" alt="Game Cover"
                     class="w-16 hover:opacity-75 transition ease-in-out duration-150">
            </a>
            <div class="ml-4">
                <a href="{{route('games.show', ['slug'=> $game['slug']])}}" class="hover:text-gray-300">{{$game['name']}}</a>
                <div class="text-gray-400 text-sm mt-1">
                    {{ $game['releaseDate'] }}
                </div>
            </div>
        </div>
    @empty
        @foreach(range(1,4) as $game)
            <div class="game flex">
                <a href="#">
                    <div class="bg-gray-800 w-16 h-20 flex-none"></div>
                </a>
                <div class="ml-4">
                    <div class="block text-transparent bg-gray-700 leading-tight text-sm mt-1">
                        names goes here
                    </div>
                    <div class="text-transparent bg-gray-700 text-xs mt-2">
                        Dec 11, 2020
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>
