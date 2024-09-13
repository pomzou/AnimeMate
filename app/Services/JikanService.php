<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JikanService
{
    protected $baseUrl = 'https://api.jikan.moe/v4';

    public function getTopAnime($page = 1, $limit = 20)
    {
        $response = Http::get("{$this->baseUrl}/top/anime", [
            'page' => $page,
            'limit' => $limit
        ]);

        return $response->json();
    }

    public function getAnimeDetails($id)
    {
        $response = Http::get("{$this->baseUrl}/anime/{$id}");

        return $response->json();
    }
}