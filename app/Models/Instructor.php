<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{   
    use HasFactory;

    protected $table = 'instructors';

    protected $primaryKey = 'instructorID';

    protected $fillable = [
        'instructorName', 'instructorDescription',
    ];

    public $timestamps = FALSE;

    public function instructor()
    {
        return $this->hasMany('App\Model\Instructor');
    }

    public function status()
    {
        return $this->belongsToMany('App\Models\Status');
    }

    public function hasAnyStatus($status)
    {
        if($this->status()->wherIn('statusName', $status)->first()){
           return true;
        }

        return false;
    }


    public function hasStatus($Statuses)
    {
        if($this->status()->where('statusName', $Statuses)->first()){
           return true;
        }

        return false;
    }

}
