<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name','last_name','email','phone','notes'];

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'contact_group');
    }
}
