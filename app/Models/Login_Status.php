<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login_Status extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email',
        'last_login_at',
    ];

    protected $table='login_status';
}
