<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'topic_id',
        'comment_noidung',
        'comment_date',
    ];
    protected $primaryKey = 'comment_id'; 
    protected $table = 'tbl_comment';

    public function account() {
        return $this->belongsTo(Account::class, 'user_id', 'user_id');
    }

    public function topic() {
        return $this->belongsTo(Topic::class, 'topic_id', 'topic_id');
    }
}
