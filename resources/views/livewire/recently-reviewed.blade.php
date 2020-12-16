<div wire:init="loadRecentlyReviewed"
     class="recently-viewed w-full lg:w-3/4 mr-0 lg:mr-32">
    <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
    <div class="recently-reviewed-container space-y-12 mt-8">
        @forelse($recentlyReviewed as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <a href="{{route('games.show', ['slug'=> $game['slug']])}}">
                        <img src="{{$game['coverImageUrl']}}" alt="Game Cover"
                             class="w-20 lg:w-48 hover:opacity-75 transition ease-in-out duration-150 shadow-md">
                    </a>
                    @if(array_key_exists('rating', $game))
                        <div  class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full"
                             style="right: -20px;bottom: -20px">
                            <div id="review_{{$game['slug']}}" class="font-semibold text-xs flex justify-center items-center h-full"></div>
                        </div>
                    @endif
                </div>
                <div class="ml-12">
                    <a href="{{route('games.show', ['slug'=> $game['slug']])}}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">
                        {{$game['name']}}
                    </a>
                    <div class="text-gray-400 mt-1">
                        {{$game['platforms']}}
                    </div>
                    <p class="mt-6 text-gray-400 hidden lg:block">
                        {{$game['summary']}}
                    </p>
                </div>
            </div>
        @empty
            @foreach(range(1,3) as $game)
                <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6 animate-pulse">
                    <div class="relative flex-none">
                        <a href="#">
                            <div class="bg-gray-700 w-44 h-56"></div>
                        </a>
                    </div>
                    <div class="ml-12">
                        <div class="block text-transparent text-lg bg-gray-700 leading-tight inline-block mt-4">
                            names goes here
                        </div>
                        <div class="text-transparent space-y-4 hidden lg:block mt-6 ">
                            <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur doloremque, in</span>
                            <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur doloremque, in</span>
                            <span class="text-transparent bg-gray-700 rounded inline-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur doloremque, in</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforelse
    </div>
</div>

@push('scripts')
    @include('partials._rating', [
        'event' => 'reviewGameWithRatingAdded'
    ])
@endpush
