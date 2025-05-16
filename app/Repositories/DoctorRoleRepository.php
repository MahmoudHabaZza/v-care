<?php

namespace App\Repositories;

use App\Models\DoctorRole;
use App\Repositories\Interfaces\DoctorRoleRepositoryInterface;

class DoctorRoleRepository implements DoctorRoleRepositoryInterface{
    public function getAll()
    {
        return DoctorRole::get();
    }
    public function getById($doctorRoleId){
        $role = DoctorRole::findOrFail($doctorRoleId);
        return $role;
    }
    public function create($data){
        return DoctorRole::create($data);
    }
    public function update($id,$data){
        $role = DoctorRole::findOrFail($id)->update($data);
        return $role;
    }
    public function delete($id){
        $role = DoctorRole::findOrFail($id)->delete();
        return $role;
    }
}