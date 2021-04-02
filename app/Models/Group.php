<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;


    protected $fillable = ['group_name', 'group_code', 'group_description','created_by','updated_by'];

    //Declaration contact method that a GROUP HAS MANY contacts
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
