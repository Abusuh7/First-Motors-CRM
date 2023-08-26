<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Previous_Owner_Details extends Model
{
    use HasFactory;

    protected $table = 'previous_owner_details';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'gender',
        'dob',
        'age',
        'occupation',
        'address',
        'city',
        'state',
        'zip_code',
        'country',

    ];
}
