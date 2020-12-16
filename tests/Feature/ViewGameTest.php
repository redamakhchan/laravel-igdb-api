<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /**
     * @test
     */
    public function the_game_page_shows_correct_game_info()
    {
        Http::fake([
            config('services.igdb.api-url') => $this->getGamesData(),
        ]);

        $response = $this->get(route('games.show', "zaos"));

        $response->assertSuccessful();
        $response->assertSee("fake-Role-playing");
        $response->assertSee("Pokémon Sword");
            $response->assertSee("t_cover_big/co2lgm.jpg");
    }

    public function getGamesData()
    {

        return  Http::response(
            [
                0 =>  [
                    "id" => 141408,
                    "cover" =>  [
                        "id" => 121126,
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2lgm.jpg"
                    ],
                    "first_release_date" => 1606435200,
                    "genres" =>  [
                        0 =>  [
                            "id" => 12,
                            "name" => "fake-Role-playing (RPG)"
                        ],
                        1 =>  [
                            "id" => 31,
                            "name" => "Adventure"
                        ]
                    ],
                    "involved_companies" =>  [
                        0 =>  [
                            "id" => 114202,
                            "company" => [
                                "id" => 30356,
                                "name" => "Zaos Entertainment S.A"
                            ]
                        ]
                    ],
                    "name" => "Zaos",
                    "platforms" => [
                        0 =>  [
                            "id" => 6,
                            "abbreviation" => "PC"
                        ]
                    ],
                    "rating" => 100.0,
                    "screenshots" =>  [
                        0 =>  [
                            "id" => 410906,
                            "alpha_channel" => false,
                            "animated" => false,
                            "game" => 141408,
                            "height" => 1080,
                            "image_id" => "sc8t22",
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc8t22.jpg",
                            "width" => 1920,
                            "checksum" => "35eb83c0-7f59-af1f-7a12-81bb7a958309"
                        ]
                    ],
                    "similar_games" =>  [
                        0 =>  [
                            "id" => 37382,
                            "cover" =>  [
                                "id" => 92738,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1zk2.jpg"
                            ],
                            "name" => "Pokémon Sword",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 130,
                                    "abbreviation" => "Switch"
                                ]
                            ],
                            "rating" => 71.793430857817,
                            "slug" => "pokemon-sword"
                        ],
                        1 =>  [
                            "id" => 55038,
                            "cover" =>  [
                                "id" => 82160,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1re8.jpg"
                            ],
                            "name" => "Immortal: Unchained",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 =>  [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 59.585492227979,
                            "slug" => "immortal-unchained"
                        ],
                        2 =>  [
                            "id" => 55199,
                            "cover" =>  [
                                "id" => 81874,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1r6a.jpg"
                            ],
                            "name" => "Dragon: Marked for Death",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 130,
                                    "abbreviation" => "Switch"
                                ]
                            ],
                            "rating" => 83.0,
                            "slug" => "dragon-marked-for-death"
                        ],
                        3 =>  [
                            "id" => 81249,
                            "cover" =>  [
                                "id" => 91183,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1ycv.jpg"
                            ],
                            "name" => "The Elder Scrolls VI",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 167,
                                    "abbreviation" => "PS5"
                                ],
                                2 =>  [
                                    "id" => 169,
                                    "abbreviation" => "Series X"
                                ]
                            ],
                            "slug" => "the-elder-scrolls-vi"
                        ],
                        4 =>  [
                            "id" => 96217,
                            "cover" =>  [
                                "id" => 72919,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1k9j.jpg"
                            ],
                            "name" => "Eternity: The Last Unicorn",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 =>  [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 60.0,
                            "slug" => "eternity-the-last-unicorn"
                        ],
                        5 =>  [
                            "id" => 101608,
                            "cover" =>  [
                                "id" => 69296,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1hgw.jpg"
                            ],
                            "name" => "ANIMA: GATE OF MEMORIES - THE NAMELESS CHRONICLES",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 =>  [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ]
                            ],
                            "rating" => 60.0,
                            "slug" => "anima-gate-of-memories-the-nameless-chronicles"
                        ],
                        6 =>  [
                            "id" => 106987,
                            "cover" =>  [
                                "id" => 97981,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co23lp.jpg"
                            ],
                            "name" => "Torchlight III",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 =>  [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ],
                                3 =>  [
                                    "id" => 130,
                                    "abbreviation" => "Switch"
                                ]
                            ],
                            "rating" => 56.629213483146,
                            "slug" => "torchlight-iii"
                        ],
                        7 =>  [
                            "id" => 115653,
                            "cover" =>  [
                                "id" => 92737,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1zk1.jpg"
                            ],
                            "name" => "Pokémon Shield",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 130,
                                    "abbreviation" => "Switch"
                                ]
                            ],
                            "rating" => 67.407440821946,
                            "slug" => "pokemon-shield"
                        ],
                        8 =>  [
                            "id" => 116530,
                            "cover" =>  [
                                "id" => 116509,
                                "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2hwd.jpg"
                            ],
                            "name" => "Vampire: The Masquerade - Bloodlines 2",
                            "platforms" =>  [
                                0 =>  [
                                    "id" => 6,
                                    "abbreviation" => "PC"
                                ],
                                1 =>  [
                                    "id" => 48,
                                    "abbreviation" => "PS4"
                                ],
                                2 =>  [
                                    "id" => 49,
                                    "abbreviation" => "XONE"
                                ],
                                3 =>  [
                                    "id" => 167,
                                    "abbreviation" => "PS5"
                                ],
                                4 =>  [
                                    "id" => 169,
                                    "abbreviation" => "Series X"
                                ]
                            ],
                            "slug" => "vampire-the-masquerade-bloodlines-2"
                        ]
                    ],
                    "slug" => "zaos",
                    "summary" => "International Free to Play Fantasy MMORPG game, featuring incredible journeys through a beautiful expanding world.",
                    "videos" =>  [
                        0 =>  [
                            "id" => 43430,
                            "game" => 141408,
                            "name" => "Trailer",
                            "video_id" => "m0-KktaHWUI",
                            "checksum" => "303c4077-04ce-234f-24d7-cba1b885544a"
                        ]
                    ],
                    "websites" =>  [
                        0 =>  [
                            "id" => 162427,
                            "category" => 1,
                            "game" => 141408,
                            "trusted" => false,
                            "url" => "https://zaos.global",
                            "checksum" => "63aaaec9-e02b-8541-910f-0df80ea67441"
                        ],
                        1 =>  [
                            "id" => 162428,
                            "category" => 4,
                            "game" => 141408,
                            "trusted" => true,
                            "url" => "https://facebook.com/g/facebook",
                            "checksum" => "d40f7d3c-d5f0-7345-9a76-2c9b0a1f9215"
                        ],
                        2 =>  [
                            "id" => 162429,
                            "category" => 18,
                            "game" => 141408,
                            "trusted" => true,
                            "url" => "https://discord.gg/g/discord",
                            "checksum" => "dd84c422-0fc0-019d-6ba0-536101cd922b"
                        ],
                        3 =>  [
                            "id" => 163201,
                            "category" => 6,
                            "game" => 141408,
                            "trusted" => true,
                            "url" => "https://www.twitch.tv/directory/game/Zaos",
                            "checksum" => "2c00277a-fc80-6b0a-c7f8-1208716ee3f0"
                        ]
                    ]
                ]
            ]
            , 200);
    }
}
