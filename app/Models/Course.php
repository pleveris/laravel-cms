<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'start_date', 'end_date', 'status',
    ];

    public function folders()
    {
        return $this->hasMany(Folder::class);
    }

    public function enrolments()
    {
        return $this->hasMany(Enrolment::class);
    }

}
