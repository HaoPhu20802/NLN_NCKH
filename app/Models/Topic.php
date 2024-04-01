<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'topic_name',
        'topic_start',
        'topic_end',
        'topic_status',
        'topic_linhvuc',
    ];
    protected $primaryKey = 'topic_id';
    protected $table = 'tbl_topic';

}
