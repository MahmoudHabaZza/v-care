<?php

namespace App\Services;

use App\Repositories\Interfaces\ContactUsRepositoryInterface;

class ContactUsService {
    public function __construct(public ContactUsRepositoryInterface $repository) { // model binding => service container
    }
    public function getAll()
    {
        return $this->repository->getAll();
    }
    public function getById($id){
        return $this->repository->getById($id);
    }
    public function create(array $data){
        return $this->repository->create($data);
    }
    public function update($id,$data){
        return $this->repository->update($id,$data);
    }
    public function delete($id){
        return $this->repository->delete($id);
    }
}