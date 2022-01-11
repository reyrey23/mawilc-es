<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentEnrolled extends Model
{
    use HasFactory;

    protected $table = 'student_enrollment';

    protected $primaryKey = 'enrollmentID';

    protected $fillable = [
        'enrollmentYear', 'enrollmentStatus', 'user_id', 'subjectID', 'subject_scheduleID',
    ];

    public function StudentEnrolledID()
    {
        return $this->hasMany('App\Model\StudentEnrolled');
    }
}
