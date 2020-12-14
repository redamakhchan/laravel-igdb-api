<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $current = Carbon::now()->timestamp;

        $comingSoonUnformatted = Http::withHeaders([
            'Client-ID' => config('services.igdb.client-id'),
            'Authorization' => config('services.igdb.access-token'),
        ])
            ->withBody("
                    fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary, slug;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$current}
                   );
                    sort first_release_date asc;
                    limit 4;
                ", "text/plain"
            )->post(config('services.igdb.api-url'))
            ->json();

        $this->comingSoon = $this->formatForView($comingSoonUnformatted);

    }

    public function render()
    {
        return view('livewire.coming-soon');
    }

    private function formatForView($games){
        return collect($games)->filter()->map(function ($game){
            return collect($game)->merge([
                'coverImageUrl' => array_key_exists('cover', $game)?str_replace("thumb", "cover_small", $game['cover']['url']):asset('img/ff7.jpg'),
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y')
            ]);
        })->toArray();
    }
}
