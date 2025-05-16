<?php

namespace App\Repositories\Interfaces;

interface DoctorRoleRepositoryInterface {
    public function getAll();
    public function getById($doctorRoleId);
    public function create($data);
    public function update($id,$data);
    public function delete($id);
}