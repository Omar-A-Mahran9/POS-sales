<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminpanelsetting extends Model
{
    use HasFactory;
    protected $table='adminpanelsettings';

    protected $fillable=[
        'id',
        'system_name',
        'photo',
        'active',
        'general_alert',
        'address',
        'phone',
        'added_by',
        'updated_by',
        'created_at',
        'updated_at',
        'com_code'
    ];
}
