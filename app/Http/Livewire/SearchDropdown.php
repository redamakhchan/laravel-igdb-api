<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = "";
    public $searchResult = [];

    public function render()
    {
        if(strlen($this->search) >= 2){
            $this->searchResult = Http::withHeaders([
                'Client-ID' => config('services.igdb.client-id'),
                'Authorization' => config('services.igdb.access-token'),
            ])
                ->withBody("
                    search \"{$this->search}\";
                    fields name, cover.url, slug;
                    limit 8;
                ", "text/plain"
                )->post(config('services.igdb.api-url'))
                ->json();

        }


        return view('livewire.search-dropdown');
    }
}
