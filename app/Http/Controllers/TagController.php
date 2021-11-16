<?php

namespace App\Http\Controllers;

use App\Services\TagService;
use App\Http\Requests\TagRequest;
use App\Http\Resources\TagResource;

class TagController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $tagService;
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = TagResource::collection($this->tagService->all());
        return $this->paginate($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {

        $data = $this->tagService->saveData($request->all());
        return $this->sendResponse(new TagResource($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->tagService->findById($id);
        return $this->sendResponse(new TagResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $data = $this->tagService->updateData($id, $request->all());
        return $this->sendResponse(new TagResource($data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tagService->deleteById($id);
        return response()->json(['message' => "deleted"], 200);
    }
}
