<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['content','uid', 'post_id'];
    public function getUsername()
    {
        return $this->belongsTo('App\Models\User');
    }
}
