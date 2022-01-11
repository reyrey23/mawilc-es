<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;

    protected $table = 'student';

    protected $primaryKey = 'studentID ';

    protected $fillable = [
        'id ', 'studentAcademicLevel',
    ];

    public $timestamps = FALSE;
}
