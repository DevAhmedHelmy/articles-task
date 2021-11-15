<?php

namespace App\Http\Controllers;

use App\Services\ArticleService;
use App\Http\Requests\ArticleRequest;
use App\Http\Resources\ArticleResource;

class ArticleController extends BaseController
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ArticleResource::collection($this->articleService->all());
        return $this->paginate($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        $data = $this->articleService->saveData($request->all());
        return $this->sendResponse(new ArticleResource($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->articleService->findById($id);
        return $this->sendResponse(new ArticleResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $data = $this->articleService->updateData($id, $request->all());
        return $this->sendResponse(new ArticleResource($data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->articleService->deleteById($id);
        return response()->json(['message' => "deleted"], 200);
    }
}
