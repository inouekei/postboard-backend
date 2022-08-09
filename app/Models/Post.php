<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = array('id');
    protected $fillable = ['content', 'uid'];
    public function getUsername()
    {
        return $this->belongsTo('App\Models\User')->name;
    }
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
