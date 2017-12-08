<?php

namespace App\Models;

use App\Lib\Storage\Store;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $fillable = ['name','slug','logo_url','active','email','phone','app_public_key','app_private_key','uuid', 'code'];

    protected $guarded = ['id'];

    protected $visible = ['id', 'name','slug','logo_url','active', 'branches', 'navigation',
        'users','email','phone', 'configurations', 'modules', 'app_public_key'];

    protected $casts = ['active' => 'boolean'];

    /**
     * @return mixed
     */
    public function branches(){
        return $this->hasMany('App\Models\Branch')
            ->select('branches.id', 'street', 'street2', 'exterior', 'interior', 'zip_code', 'phone', 'company_id', 'city_id', DB::raw('astext(ubication) as ubication'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function users(){
        return $this->hasManyThrough('App\Models\User', 'App\Models\CompanyUser');
    }

    public function roles(){
        return $this->hasMany(Role::class)->orderBy('role', 'asc');
    }
}
