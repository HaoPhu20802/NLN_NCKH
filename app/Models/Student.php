<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nganh_id',
        'user_id',
        'student_name',
        'student_ngaysinh',
        'student_gioitinh',
        'student_khoahoc',
    ];
    protected $primaryKey = 'student_id';
    protected $table = 'tbl_students';

    public function account() {
        return $this->belongsTo(Account::class, 'user_id', 'user_id');
    }

}
