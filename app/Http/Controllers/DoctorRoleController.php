<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRoleStoreRequest;
use App\Http\Resources\DoctorRoleResource;
use App\Models\DoctorRole;
use App\Services\DoctorRoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DoctorRoleController extends Controller
{
    public function __construct(public DoctorRoleService $service)
    {
    }
    function index()
    {
        return $this->successResponse(DoctorRoleResource::collection($this->service->getAll()));
        // return response()->json(['data' => ]);
    }
    function show($doctor_role_id)
    {
        // $validator = Validator::make(['id' => $doctor_role_id], [
        //     'id' => 'required|exists:doctor_roles,id'
        // ]);

        // if ($validator->fails()) {
        //     return $this->errorResponse($validator->errors(), 422);
        // }
        return $this->successResponse(new DoctorRoleResource($this->service->getById($doctor_role_id)));
    }
    function store(DoctorRoleStoreRequest $request)
    {
        return $this->successResponse(new DoctorRoleResource($this->service->create($request->validated())), "Created Successfully", 201);
    }
    function update($doctor_role_id, DoctorRoleStoreRequest $request)
    {
        $this->service->update($doctor_role_id, $request->validated());
        return $this->successResponse([], "Upated Successfully", 204);
    }
    function destroy($doctor_role)
    {

        $this->service->delete($doctor_role);
        return $this->successResponse([], "Deleted Successfully", 204);
    }
}
