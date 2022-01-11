<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    protected $primaryKey = 'subjectID';

    protected $fillable = [
        'subjectCode', 'subjectDescription',
    ];

    public $timestamps = FALSE;

    public function subjectID()
    {
        return $this->hasMany('App\Model\Subject');
    }
}
