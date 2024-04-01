<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_image',
        'user_email',
        'user_password',
        'user_role',
    ];
    protected $primaryKey = 'user_id';
    protected $table = 'tbl_accounts';

    public function student() {
        return $this->hasOne(Student::class, 'user_id', 'user_id');
    }

    public function teacher() {
        return $this->hasOne(Teacher::class, 'user_id', 'user_id');
    }

    public function comment() {
        return $this->hasOne(Comment::class, 'user_id', 'user_id');
    }
}
