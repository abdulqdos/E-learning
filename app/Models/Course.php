<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    public $guarded = [] ;
    public function instructor()
    {
        return $this->belongsTo(User::class , 'instructor_id' );
    }

    public function category()
    {
        return $this->belongsTo(Category::class  );
    }
}
