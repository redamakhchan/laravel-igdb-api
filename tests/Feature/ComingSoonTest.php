<?php

namespace Tests\Feature;

use App\Http\Livewire\ComingSoon;
use App\Http\Livewire\MostAnticipated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class ComingSoonTest extends TestCase
{
    /**
     * @test
     */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->fakeComingSoon(),
        ]);

        Livewire::test(ComingSoon::class)
            ->assertSet('comingSoon', [])
            ->call('loadComingSoon')
        ->assertSee('Ancient Cities FK');
    }

    private function fakeComingSoon()
    {
        return  Http::response(
            [
                0 => [
                    "id" => 79134,
                    "cover" => [
                        "id" => 82162,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rea.jpg"
                    ],
                    "first_release_date" => 1608163200,
                    "name" => "Ancient Cities FK",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "slug" => "ancient-cities",
                    "summary" => "
      Ancient Citiesis a Survival and Strategy City Builder PC game through the ages, strongly focused on history and realism. Currently being developed by Uncasual Games. \n
       \n
      Starting in the Neolithic era, you will have to guide your people through generations, discovering and improving technologies, managing resources and population, facing threats from raiders and Mother Nature herself. And, ultimately, building the most fantastic city of antiquity through the ages in a fully simulated world and ecosystem.
      "
                ],
                1 => [
                    "id" => 115473,
                    "cover" => [
                        "id" => 100014,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2566.jpg"
                    ],
                    "first_release_date" => 1608163200,
                    "name" => "Airborne Kingdom",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        1 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ]
                    ],
                    "slug" => "airborne-kingdom",
                    "summary" => "Take a fantastical journey — fly the desert and build your domain. Airborne Kingdom uniquely blends city management and exploration, with a world and lore all its own. Build housing, gather food, satisfy needs, and grow your tribe. Maintain lift, discover resources, and explore the desert for lost technologies. The kingdom, your journey, their lives — all of it is up to you to decide"
                ],
                2 => [
                    "id" => 121533,
                    "cover" => [
                        "id" => 88519,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1wav.jpg"
                    ],
                    "first_release_date" => 1608163200,
                    "name" => "Kaleidoscope of Phantasm Prison",
                    "platforms" => [
                        0 => [
                            "id" => 46,
                            "abbreviation" => "Vita"
                        ],
                        1 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        2 => [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "kaleidoscope-of-phantasm-prison",
                    "summary" => "A project penned by Ryukishi07 and illustrated by Inoue Itaru. The scriptwriter describes the story as \"a terrifying tale of how these innocent cute girls will have everything taken from them with no mercy\"."
                ],
                3 => [
                    "id" => 121611,
                    "cover" => [
                        "id" => 88529,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1wb5.jpg"
                    ],
                    "first_release_date" => 1608163200,
                    "name" => "Kaleidoscope of Phantasm Prison - Limited Edition",
                    "platforms" => [
                        0 => [
                            "id" => 46,
                            "abbreviation" => "Vita"
                        ],
                        1 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ],
                        2 => [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "kaleidoscope-of-phantasm-prison-limited-edition",
                    "summary" => "
      The Limited Edition of the game currently has 4 bonus items. \n
       \n
      Phantasm Object, an official setting document collection \n
      - Includes comments on character design and the heroine's expressions, comments from the cast, staff members and Ryukishi07. Also includes the Drama CD script. \n
       \n
      Voice Drama CD, 密室デスクイズ大会 / \"Closed Room Desk Quiz Tournament\" \n
      - An alternate story using the same setting as the main game written by Ryukishi07 that reveals a new aspect of the heroine. \n
       \n
      Cards of fate, 4 piece card set \n
      - A reproduction of the Fate Cards from the game. \n
       \n
      Acrylic art panel, 雨上がりの紫陽花－風華－ / \"Hydrangea after the rain - Fuka\" \n
      - Visual of “Fuka” and “Ku-chan” surrounded by hydrangea shining with dew made into high quality art panels.
      "
                ]
            ]
,
            200
        );
    }
}
