<?php

namespace App\Repositories\Interfaces;

interface ContactUsRepositoryInterface {
    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($id,$data);
    public function delete($id);
}