<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialMediaRequest;
use App\Http\Resources\SocialMediaResource;
use App\Services\SocialMediaServices;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function __construct(public SocialMediaServices $service){
    }
    public function index(){
        return $this->successResponse(SocialMediaResource::collection($this->service->getAll()));

    }
    public function show(string $id){
        return $this->successResponse(new SocialMediaResource($this->service->getById($id)));
    }
    public function store(SocialMediaRequest $request){
        return $this->successResponse(new SocialMediaResource($this->service->create($request->validated())),"Created Successfully",201);
    }
    public function update(string $id,SocialMediaRequest $request){
        $this->service->update($id,$request->validated());
        return $this->successResponse([],"Updated Successfully",204);
    }
    public function destroy(string $id){
        $this->service->delete($id);
        return $this->successResponse([],'Deleted Successfully',204);
    }
}
