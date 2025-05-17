<?php

namespace App\Repositories;

use App\Models\SocialMedia;
use App\Repositories\Interfaces\SocialMediaRepositoryInterface;

class SocialMediaRepository implements SocialMediaRepositoryInterface{
    public function getAll()
    {
        return SocialMedia::paginate();
    }
    public function getById($id){
        $socialMedia = SocialMedia::findOrFail($id);
        return $socialMedia;
    }
    public function create($data){
        return SocialMedia::create($data);
    }
    public function update($id,$data){
        $socialMedia = SocialMedia::findOrFail($id)->update($data);
        return $socialMedia;
    }
    public function delete($id){
        $socialMedia = SocialMedia::findOrFail($id)->delete();
        return $socialMedia;
    }
}