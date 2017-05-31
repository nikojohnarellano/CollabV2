<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'answer', 'category', 'owner'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'noteid');
    }
}
