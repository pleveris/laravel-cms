<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'course_id', 'title'
    ];

    public function course()
    {
        return  $this->belongsTo(Course::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
