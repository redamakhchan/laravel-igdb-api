<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders([
            'Client-ID' => config('services.igdb.client-id'),
            'Authorization' => config('services.igdb.access-token'),
        ])
            ->withBody("
                    fields name, platforms.abbreviation, cover.url, first_release_date, rating, slug, involved_companies.company.name, 
                    genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, 
                    similar_games.name, similar_games.rating,similar_games.platforms.abbreviation, similar_games.slug;
                    where slug = \"{$slug}\";
            ", "text/plain")
            ->post(config('services.igdb.api-url'))
            ->json();

            abort_if(!$game, 404);

        return view('show', [
            'game' => $this->formatForView($game[0])
        ]);
    }

    private function formatForView($game){
        return collect($game)->merge([
            'coverImageUrl' => array_key_exists('cover', $game)?str_replace("thumb", "cover_big", $game['cover']['url']):asset('img/ff7.jpg'),
            'genres' => array_key_exists('genres', $game)?collect($game['genres'])->pluck('name')->implode(', '):"",
            'involvedCompanies' => array_key_exists('involved_companies', $game)?$game['involved_companies'][0]['company']['name']:"",
            'platforms' => array_key_exists('platforms', $game)?collect($game['platforms'])->pluck('abbreviation')->implode(', '):'',
            'memberRating' => array_key_exists('rating', $game)?round($game['rating']):"0",
            'criticRating' => array_key_exists('aggregated_rating', $game)?round($game['aggregated_rating']):"0",
            'trailer' => array_key_exists('videos', $game)?"https://youtube.com/embed/".$game['videos'][0]['video_id']:null,
            'screenshots' => array_key_exists('screenshots', $game)?collect($game['screenshots'])->map(function ($screenshot){
                return [
                    'big' => str_replace("thumb", "screenshot_big", $screenshot['url']),
                    'huge' => str_replace("thumb", "screenshot_huge", $screenshot['url']),
                ];
            })->take(9):null,
            'similarGames' => collect($game['similar_games'])->map(function ($game){
                return collect($game)->merge([
                    'coverImageUrl' => array_key_exists('cover', $game)?str_replace("thumb", "cover_big", $game['cover']['url']):asset('img/ff7.jpg'),
                    'rating' => array_key_exists('rating', $game)?round($game['rating']):null,
                    'platforms' => array_key_exists('platforms', $game)?collect($game['platforms'])->pluck('abbreviation')->implode(', '):'',
                ]);
            })->take(6),
            'social' => [
                'website' => array_key_exists('websites', $game)?collect($game['websites'])->first():null,
                'facebook' => array_key_exists('websites', $game)?collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'facebook');
                })->first():null,
                'instagram' => array_key_exists('websites', $game)?collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'instagram');
                })->first():null,
                'twitter' => array_key_exists('websites', $game)?collect($game['websites'])->filter(function ($website){
                    return Str::contains($website['url'], 'twitter');
                })->first():null,
            ]
        ])->toArray();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
