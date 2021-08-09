<?php

namespace SoftDeliveroo\Database\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'email', 'token'
    ];
}
