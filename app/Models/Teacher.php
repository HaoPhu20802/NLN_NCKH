<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'khoa_id',
        'user_id',
        'teacher_name',
        'teacher_ngaysinh',
        'teacher_gioitinh',
        'teacher_ngachvienchuc',
        'teacher_trinhdo',
    ];
    protected $primaryKey = 'teacher_id';
    protected $table = 'tbl_teachers';

    public function account() {
        return $this->belongsTo(Account::class, 'user_id', 'user_id');
    }
}
