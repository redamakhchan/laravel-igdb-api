<?php

namespace Tests\Feature;

use App\Http\Livewire\PopularGames;
use App\Http\Livewire\RecentlyReviewed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class RecentlyReviewedTest extends TestCase
{
    /**
     * @test
     */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->fakeRecentlyReviewed(),
        ]);

        Livewire::test(RecentlyReviewed::class)
            ->assertSet('recentlyReviewed', [])
            ->call('loadRecentlyReviewed')
        ->assertSee('Zaos FK');
    }

    private function fakeRecentlyReviewed()
    {
        return  Http::response(
            [
                0 => [
                    "id" => 141408,
                    "cover" => [
                        "id" => 121126,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2lgm.jpg"
                    ],
                    "first_release_date" => 1606435200,
                    "name" => "Zaos FK",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "rating" => 100.0,
                    "rating_count" => 9,
                    "slug" => "zaos",
                    "summary" => "International Free to Play Fantasy MMORPG game, featuring incredible journeys through a beautiful expanding world."
                ],
                1 => [
                    "id" => 140158,
                    "cover" => [
                        "id" => 117771,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2ivf.jpg"
                    ],
                    "first_release_date" => 1602892800,
                    "name" => "supfly delivery simulator",
                    "platforms" => [
                        0 => [
                            "id" => 3,
                            "abbreviation" => "Linux"
                        ],
                        1 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        2 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ]
                    ],
                    "rating" => 90.687830687831,
                    "rating_count" => 11,
                    "slug" => "supfly-delivery-simulator",
                    "summary" => "Supfly Delivery Simulator - a game in which humanity is ruled by delivery service and now it's your time to become the best deliveryman in the world! Deliver everything what is needed in the moment. As a robot you have one simple job - to deliver. But remember, you have to be punctual and precise - you don't want to make customers angry. Watch out for your battery level - if it ran out, you would be in trouble. So jump in the game, catch some parcels and try yourself as a deliverer!"
                ],
                2 => [
                    "id" => 133004,
                    "cover" => [
                        "id" => 111927,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2ed3.jpg"
                    ],
                    "first_release_date" => 1604966400,
                    "name" => "Assassin's Creed Valhalla",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        1 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        2 => [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ],
                        3 => [
                            "id" => 167,
                            "abbreviation" => "PS5"
                        ],
                        4 => [
                            "id" => 169,
                            "abbreviation" => "Series X"
                        ],
                        5 => [
                            "id" => 170,
                            "abbreviation" => "Stadia"
                        ]
                    ],
                    "rating" => 88.901211143301,
                    "rating_count" => 6,
                    "slug" => "assassins-creed-valhalla",
                    "summary" => "In Assassin's Creed Valhalla, become Eivor, a legendary Viking raider on a quest for glory. Explore a dynamic and beautiful open world set against the brutal backdrop of England’s Dark Ages. Raid your enemies, grow your settlement, and build your political power in the quest to earn a place among the gods in Valhalla."
                ]
            ]

            , 200
        );
    }
}
