<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $current = Carbon::now()->timestamp;
        $afterFourMonths = Carbon::now()->addMonths(4)->timestamp;

        $mostAnticipatedUnformatted = Http::withHeaders([
            'Client-ID' => config('services.igdb.client-id'),
            'Authorization' => config('services.igdb.access-token'),
        ])
            ->withBody("
                    fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary, slug;
                    where platforms = (48,49,130,6)
                    & (first_release_date >= {$current}
                    & first_release_date < {$afterFourMonths});
                    sort rating desc;
                    limit 4;
                ", "text/plain")
            ->post(config('services.igdb.api-url'))
            ->json();

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);

    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }

    private function formatForView($games){
        return collect($games)->map(function ($game){
            return collect($game)->merge([
                'coverImageUrl' => array_key_exists('cover', $game)?str_replace("thumb", "cover_small", $game['cover']['url']):asset('img/ff7.jpg'),
                'releaseDate' => Carbon::parse($game['first_release_date'])->format('M d, Y')
            ]);
        })->toArray();
    }
}
