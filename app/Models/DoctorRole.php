<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorRole extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorRoleFactory> */
    use HasFactory;
    protected $fillable = ['role'];
}
