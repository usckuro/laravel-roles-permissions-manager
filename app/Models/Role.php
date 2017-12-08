<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Role extends Model
{
    protected $fillable = ['role','active','description','company_id', 'code'];
    protected $visible = ['id','role', 'users','company_id', 'code'];
    protected $casts = [
        'id'            => 'integer',
        'role'          => 'string',
        'active'        => 'boolean',
        'description'   => 'string',
        'company_id'    => 'integer'
    ];

    const ROOT_ROLE     = 3;
    const ADMIN_ROLE    = 1;
    const USER_ROLE     = 2;
    const REMEMBER_ROLE = 60;

    const ROOT_CODE         = 'R00T';
    const ADMIN_CODE        = 'A8M1N';
    const SUPERVISOR_CODE   = 'S0P1S0';
    const CALLCENTER_CODE   = 'C4LLC3R';
    const DELIVERY_CODE     = 'D3L1VR';
    const OWNER_CODE        = '0WN3R';
    const FULFILLMENT_CODE  = 'F1LLM3NT';

    /**
     * @description relationship method to get the users related to the role
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function role_permissions(){
        return $this->hasMany('App\Models\RolePermission');
    }

    public function admin_permissions(){
        return $this->belongsToMany('App\Models\Permission', 'roles_permissions')->where('platform_type', Permission::ADMIN);
    }

    public function owner_permissions(){
        return $this->belongsToMany('App\Models\Permission', 'roles_permissions')->where('platform_type', Permission::OWNER);
    }

    public function delivery_permissions(){
        return $this->belongsToMany('App\Models\Permission', 'roles_permissions')->where('platform_type', Permission::DELIVERY);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
