<?php

namespace App\Http\Controllers;

use App\Services\JikanService;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    protected $jikanService;

    public function __construct(JikanService $jikanService)
    {
        $this->jikanService = $jikanService;
    }

    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        $data = $this->jikanService->getTopAnime($page);
        
        return view('anime.index', [
            'animes' => $data['data'],
            'pagination' => $data['pagination']
        ]);
    }

    public function show($id)
    {
        $data = $this->jikanService->getAnimeDetails($id);
        
        return view('anime.show', ['anime' => $data['data']]);
    }
}