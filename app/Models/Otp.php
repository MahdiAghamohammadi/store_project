<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
//    protected $fillable = [
//        'token',
//        'user_id',
//        'otp_code',
//        'login_identify',
//        'type',
//    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
