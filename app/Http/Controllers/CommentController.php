<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use App\Http\Requests\CommentRequest;
use App\Http\Resources\CommentResource;

class CommentController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $commentService;
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = CommentResource::collection($this->commentService->all());
        return $this->paginate($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {

        $data = $this->commentService->saveData($request->all());
        return $this->sendResponse(new CommentResource($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->commentService->findById($id);
        return $this->sendResponse(new CommentResource($data));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
        $data = $this->commentService->updateData($id, $request->all());
        return $this->sendResponse(new CommentResource($data));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->commentService->deleteById($id);
        return response()->json(['message' => "deleted"], 200);
    }
}
