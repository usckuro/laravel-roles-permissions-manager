<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = ['id'];

    protected $fillable = ['role_id', 'user_id'];

    protected $visible = ['role_id', 'user_id'];

    public $timestamps = false;

    protected $casts = [
        'id' => 'integer',
        'role_id' => 'integer',
        'user_id' => 'integer'
    ];
}
