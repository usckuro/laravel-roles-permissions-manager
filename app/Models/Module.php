<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['name','description', 'code'];
    protected $visible = ['id','name','description', 'code'];
    protected $casts = ['id' => 'integer'];
    public  $timestamps = false;

    const MODULE_VINVENTORY = 'vehicle inventory';

    public function permissions(){
        return $this->hasMany(Permission::class);
    }

    public static function activeModule($module_name, $company_id){
        $module = Module::where('name', $module_name)
            ->first();

        return CompanyModule::where('company_id', $company_id)
            ->where('module_id', $module->id)
            ->where('active', true)
            ->first();
    }
}