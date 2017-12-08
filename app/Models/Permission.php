<?php

namespace App\Models;

use App\Http\Controllers\JelpController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Permission extends Model
{
    protected $fillable = ['method','description', 'action', 'platform_type'];
    protected $visible = ['id', 'description', 'action', 'platform_type', 'method'];
    protected $casts = ['id' => 'integer', 'visible' => 'boolean'];

    public  $timestamps = false;
    const ADMIN = 'admin';
    const DELIVERY = 'delivery';
    const OWNER = 'owner';
}