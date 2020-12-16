<?php

namespace Tests\Feature;

use App\Http\Livewire\ComingSoon;
use App\Http\Livewire\SearchDropdown;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class SearchDropdownTest extends TestCase
{
    /**
     * @test
     */
    public function the_search_dropdown_seaches_for_games()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->fakeSearchDropdown(),
        ]);

        Livewire::test(SearchDropdown::class)
        ->assertDontSee("Zelda")
        ->set('search', "Zelda")
        ->assertSee("FK The Legend of Zelda");
    }

    private function fakeSearchDropdown()
    {
        return  Http::response(
            [
                0 => [
                    "id" => 1034,
                    "cover" => [
                        "id" => 100964,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co25wk.jpg"
                    ],
                    "name" => "FK The Legend of Zelda: Four Swords Adventures",
                    "slug" => "the-legend-of-zelda-four-swords-adventures"
                ],
                1 => [
                    "id" => 1029,
                    "cover" => [
                        "id" => 76691,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1n6b.jpg"
                    ],
                    "name" => "The Legend of Zelda: Ocarina of Time",
                    "slug" => "the-legend-of-zelda-ocarina-of-time"
                ],
                2 => [
                    "id" => 2909,
                    "cover" => [
                        "id" => 77440,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1nr4.jpg"
                    ],
                    "name" => "The Legend of Zelda: A Link Between Worlds",
                    "slug" => "the-legend-of-zelda-a-link-between-worlds"
                ],
                3 => [
                    "id" => 1030,
                    "cover" => [
                        "id" => 76690,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1n6a.jpg"
                    ],
                    "name" => "The Legend of Zelda: Majora's Mask",
                    "slug" => "the-legend-of-zelda-majora-s-mask"
                ],
                4 => [
                    "id" => 1027,
                    "cover" => [
                        "id" => 111338,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2dwq.jpg"
                    ],
                    "name" => "The Legend of Zelda: Link's Awakening DX",
                    "slug" => "the-legend-of-zelda-link-s-awakening-dx"
                ],
                5 => [
                    "id" => 1022,
                    "cover" => [
                        "id" => 86202,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1uii.jpg"
                    ],
                    "name" => "The Legend of Zelda",
                    "slug" => "the-legend-of-zelda"
                ],
                6 => [
                    "id" => 1025,
                    "cover" => [
                        "id" => 86234,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1uje.jpg"
                    ],
                    "name" => "Zelda II: The Adventure of Link",
                    "slug" => "zelda-ii-the-adventure-of-link"
                ],
                7 => [
                    "id" => 1041,
                    "cover" => [
                        "id" => 77450,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1nre.jpg"
                    ],
                    "name" => "The Legend of Zelda: Oracle of Ages",
                    "slug" => "the-legend-of-zelda-oracle-of-ages"
                ]
            ]

  ,
            200
        );
    }
}
