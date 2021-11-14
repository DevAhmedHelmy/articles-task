<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function index()
    {
        try {
            $params = $this->articleService->all();
            dd($params);
        } catch (\Exception $e) {
        }
    }
}
