<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'title',
        'body',
        'user_id',
        'image'
    ];
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
//        return $this->belongsToMany('App\Student','student_responsables','responsable_id','student_id');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}
public function users()
    {
        return $this->hasMany('App\User');
    }
}
