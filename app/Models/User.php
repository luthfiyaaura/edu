<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'person_id', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'person_id';
    }

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function answers()
    {
        return $this->belongsToMany(Question::class, 'user_answers')->withPivot('score')->withTimestamps();
    }
}
