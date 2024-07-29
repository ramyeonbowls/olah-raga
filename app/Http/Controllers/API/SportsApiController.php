<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Sports;
use Validator;
use App\Http\Resources\SportsResource;
use Illuminate\Http\JsonResponse;

class SportsApiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $sports = Sports::all();
    
        return $this->sendResponse(SportsResource::collection($sports), 'Sports retrieved successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $sports = Sports::create($input);
   
        return $this->sendResponse(new SportsResource($sports), 'Sport created successfully.');
    } 
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        $sport = Sports::find($id);
  
        if (is_null($sport)) {
            return $this->sendError('sport not found.');
        }
   
        return $this->sendResponse(new SportsResource($sport), 'Sport retrieved successfully.');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sports $sport): JsonResponse
    {
        $input = $request->all();
   
        $validator = Validator::make($input, [
            'name' => 'required',
            'type' => 'required'
        ]);
   
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
   
        $sport->name = $input['name'];
        $sport->type = $input['type'];
        $sport->save();
   
        return $this->sendResponse(new SportsResource($sport), 'Sport updated successfully.');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $sport): JsonResponse
    {
        $sport->delete();
   
        return $this->sendResponse([], 'Sport deleted successfully.');
    }
}
