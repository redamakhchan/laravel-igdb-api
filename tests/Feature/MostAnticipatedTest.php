<?php

namespace Tests\Feature;

use App\Http\Livewire\MostAnticipated;
use App\Http\Livewire\RecentlyReviewed;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class MostAnticipatedTest extends TestCase
{
    /**
     * @test
     */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->fakeMostAnticipated(),
        ]);

        Livewire::test(MostAnticipated::class)
            ->assertSet('mostAnticipated', [])
            ->call('loadMostAnticipated')
        ->assertSee("Fortification: tower defence FK");
    }

    private function fakeMostAnticipated()
    {
        return  Http::response(
            [
                0 => [
                    "id" => 141675,
                    "cover" => [
                        "id" => 122644,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2mms.jpg"
                    ],
                    "first_release_date" => 1609372800,
                    "name" => "Fortification: tower defence FK",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "slug" => "fortification-tower-defence",
                    "summary" => "Coop or single player tower defence on procedurally generated maps."
                ],
                1 => [
                    "id" => 141674,
                    "cover" => [
                        "id" => 122641,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2mmp.jpg"
                    ],
                    "first_release_date" => 1610668800,
                    "name" => "hexceed",
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
                    "slug" => "hexceed",
                    "summary" => "A relaxing, hexagon based, puzzle game. A exciting new twist on a classic game without the element of guesswork! Use your critical thinking and our stimulating game mechanics to progress though hundreds of levels!"
                ],
                2 => [
                    "id" => 141648,
                    "first_release_date" => 1608163200,
                    "name" => "Mercenaries Blaze: Dawn of the Twin Dragons",
                    "platforms" => [
                        0 => [
                            "id" => 130,
                            "abbreviation" => "Switch"
                        ]
                    ],
                    "slug" => "mercenaries-blaze-dawn-of-the-twin-dragons",
                    "summary" => "Experience a lengthy and challenging story campaign, an enthralling tale full of emotive writing, plot twists and high stakes moments. Grow with your team by clearing strategic turn-based battles, with many optional missions and details to consider – which class will you upgrade for each character, and what equipment or skills will you prioritise?"
                ],
                3 => [
                    "id" => 141646,
                    "cover" => [
                        "id" => 122603,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2mln.jpg"
                    ],
                    "first_release_date" => 1617148800,
                    "name" => "One Shell Straight to Hell",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "slug" => "one-shell-straight-to-hell",
                    "summary" => "One Shell Straight to Hell is a top-down roguelite shooter with base defense elements starring the unordinary priest and bad-ass demon hunter Padre Alexander."
                ]
            ]
,
            200
        );
    }
}
