<?php

namespace App\Repositories;

use App\Models\ContactUs;
use App\Repositories\Interfaces\ContactUsRepositoryInterface;

class ContactUsRepository implements ContactUsRepositoryInterface{
    public function getAll()
    {
        return ContactUs::paginate();
    }
    public function getById($id){
        $contactUs = ContactUs::findOrFail($id);
        return $contactUs;
    }
    public function create($data){
        return ContactUs::create($data);
    }
    public function update($id,$data){
        $contactUs = ContactUs::findOrFail($id)->update($data);
        return $contactUs;
    }
    public function delete($id){
        $contactUs = ContactUs::findOrFail($id)->delete();
        return $contactUs;
    }
}