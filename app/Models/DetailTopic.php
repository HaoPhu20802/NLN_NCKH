<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTopic extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'topic_id',
        'student_id',
        'teacher_id',
        'detailtopic_abtract',
        'topic_views',
    ];
    protected $table = 'tbl_detailtopic';
    protected $primaryKey = 'id';
    
    public function topic() {
        return $this->belongsTo(Topic::class, 'topic_id', 'topic_id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id', 'student_id');
    }

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'teacher_id');
    }
}
