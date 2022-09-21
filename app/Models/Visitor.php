<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable=[
        'visitor_name',
        'mobile_num',
        'address',
        'gender',
        'apartment_num',
        'whom_to_meet',
        'reason',
        'remarks'
    ];

}
