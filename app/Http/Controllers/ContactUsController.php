<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactUsRequest;
use App\Http\Resources\ContactUsResource;
use App\Services\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct(public ContactUsService $service){
        
    }
    public function index()
    {
        return $this->successResponse(ContactUsResource::collection($this->service->getAll()));
    }
    public function show(string $id){
        return $this->successResponse(new ContactUsResource($this->service->getById($id)));
    }
    public function store(ContactUsRequest $request){
        return $this->successResponse(new ContactUsResource($this->store($request->validated())),"Created Successfully",201);
    }
    public function update(string $id,ContactUsRequest $request){
        $this->service->update($id,$request);
        return $this->successResponse([],"Updated Successfully",204);
    }
    public function destroy(string $id){
        $this->service->delete($id);
        return $this->successResponse([],'Deleted Successfully',204);
    }
}
