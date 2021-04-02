<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['contact_firstname', 'contact_lastname', 'contact_phone1', 'contact_phone2', 'contact_email', 'group_id','created_by','updated_by'];
    //Declare across group method that a CONTACT BELONG TO ONE GROUP
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
