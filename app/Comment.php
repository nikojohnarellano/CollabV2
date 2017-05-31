<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'postedby', 'noteid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'postedby');
    }

    public function note()
    {
        return $this->belongsTo('App\Note', 'noteid');
    }
}
