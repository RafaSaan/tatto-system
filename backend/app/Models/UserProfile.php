<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table="user_profiles";
    public static $unique_table = 'user_profiles';
    public static $unique_column = 'key';
    protected $fillable = [ 'name','key' ];

    public function modules()
    {
        return $this->hasMany('App\Models\Catalogs\CatModules');
    }

    public function permissions(){ 
        return $this->belongsToMany('App\Models\Permission','role_has_permission','profile_id','permission_id');
    }
}
