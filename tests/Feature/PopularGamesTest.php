<?php


namespace Tests\Feature;


use App\Http\Livewire\PopularGames;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;
use Tests\TestCase;

class PopularGamesTest extends TestCase
{
    /**
     * @test
     */
    public function the_main_page_shows_popular_games()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->fakePopularGames(),
        ]);

       Livewire::test(PopularGames::class)
       ->assertSet('popularGames', [])
       ->call('loadPopularGames')
       ->assertSee('Zaos Fake')
       ->assertSee('Heartbound')
       ->assertSee('Persona 5 Royal');
    }

    public function fakePopularGames()
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
                    "name" => "Zaos Fake",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "rating" => 100.0,
                    "slug" => "zaos"
                ],
                1 => [
                    "id" => 131887,
                    "cover" => [
                        "id" => 94774,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co214m.jpg"
                    ],
                    "first_release_date" => 1584403200,
                    "name" => "Project +",
                    "platforms" => [
                        0 => [
                            "id" => 5,
                            "abbreviation" => "Wii"
                        ]
                    ],
                    "rating" => 100.0,
                    "slug" => "project-plus"
                ],
                2 => [
                    "id" => 26974,
                    "cover" => [
                        "id" => 103313,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co27pt.jpg"
                    ],
                    "first_release_date" => 1545609600,
                    "name" => "Heartbound",
                    "platforms" => [
                        0 => [
                            "id" => 3,
                            "abbreviation" => "Linux"
                        ],
                        1 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "rating" => 100.0,
                    "slug" => "heartbound"
                ],
                3 => [
                    "id" => 114283,
                    "cover" => [
                        "id" => 77124,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1nic.jpg"
                    ],
                    "first_release_date" => 1572480000,
                    "name" => "Persona 5 Royal",
                    "platforms" => [
                        0 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ]
                    ],
                    "rating" => 99.963930103115,
                    "slug" => "persona-5-royal"
                ],
                4 => [
                    "id" => 74878,
                    "cover" => [
                        "id" => 99681,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co24wx.jpg"
                    ],
                    "first_release_date" => 1510012800,
                    "name" => "Hitman: Game of the Year Edition",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        1 => [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ]
                    ],
                    "rating" => 99.875776397515,
                    "slug" => "hitman-game-of-the-year-edition"
                ],
                5 => [
                    "id" => 80468,
                    "cover" => [
                        "id" => 76881,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1nbl.jpg"
                    ],
                    "first_release_date" => 1271894400,
                    "name" => "NieR RepliCant",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3"
                        ]
                    ],
                    "rating" => 99.868309765149,
                    "slug" => "nier-replicant"
                ],
                6 => [
                    "id" => 77378,
                    "cover" => [
                        "id" => 96231,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2293.jpg"
                    ],
                    "first_release_date" => 786240000,
                    "name" => "Super Mario All-Stars + Super Mario World",
                    "platforms" => [
                        0 => [
                            "id" => 19,
                            "abbreviation" => "SNES"
                        ]
                    ],
                    "rating" => 99.784691920109,
                    "slug" => "super-mario-all-stars-plus-super-mario-world"
                ],
                7 => [
                    "id" => 26834,
                    "cover" => [
                        "id" => 88375,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1w6v.jpg"
                    ],
                    "first_release_date" => 1474416000,
                    "name" => "Utawarerumono: Mask of Truth",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        1 => [
                            "id" => 9,
                            "abbreviation" => "PS3"
                        ],
                        2 => [
                            "id" => 46,
                            "abbreviation" => "Vita"
                        ],
                        3 => [
                            "id" => 48,
                            "abbreviation" => "PS4"
                        ]
                    ],
                    "rating" => 99.759823404487,
                    "slug" => "utawarerumono-mask-of-truth"
                ],
                8 => [
                    "id" => 30155,
                    "cover" => [
                        "id" => 58498,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/yo9xbijhbvts3l3gtnkq.jpg"
                    ],
                    "first_release_date" => 1475539200,
                    "name" => "Rocksmith 2014 Edition - Remastered",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ],
                        1 => [
                            "id" => 14,
                            "abbreviation" => "Mac"
                        ],
                        2 => [
                            "id" => 49,
                            "abbreviation" => "XONE"
                        ]
                    ],
                    "rating" => 99.757348307834,
                    "slug" => "rocksmith-2014-edition-remastered"
                ],
                9 => [
                    "id" => 20196,
                    "cover" => [
                        "id" => 120595,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2l1v.jpg"
                    ],
                    "first_release_date" => 1373328000,
                    "name" => "Metal Gear Solid: The Legacy Collection",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3"
                        ]
                    ],
                    "rating" => 99.741160771065,
                    "slug" => "metal-gear-solid-the-legacy-collection"
                ],
                10 => [
                    "id" => 11226,
                    "cover" => [
                        "id" => 10508,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/gjc9m7jasmxs6ofv6i3h.jpg"
                    ],
                    "first_release_date" => 959817600,
                    "name" => "Anstoss 3",
                    "platforms" => [
                        0 => [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "rating" => 99.71028149305,
                    "slug" => "anstoss-3"
                ],
                11 => [
                    "id" => 45181,
                    "cover" => [
                        "id" => 87942,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1vuu.jpg"
                    ],
                    "first_release_date" => 1354579200,
                    "name" => "Mass Effect Trilogy",
                    "platforms" => [
                        0 => [
                            "id" => 9,
                            "abbreviation" => "PS3"
                        ],
                        1 => [
                            "id" => 12,
                            "abbreviation" => "X360"
                        ]
                    ],
                    "rating" => 99.656373220357,
                    "slug" => "mass-effect-trilogy"
                ]
            ]


            , 200);
    }

}
