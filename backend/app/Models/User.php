<?php

namespace App\Models;

use App\Models\UserProfile;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'second_name',
        'email',
        'password',
        'username',
        'email_verified_at',
        'is_first_time',
        'is_active',
        'profile_id',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
		return $this->hasOne('App\Models\UserProfile','id','profile_id');
	}

    public function getPermissions(){
		$auth_role = UserProfile::where('id',$this->profile_id)->with('permissions')->first();
		$perms = []; 
		foreach($auth_role->permissions as $perm){
			array_push($perms,$perm->key);
		}
		return $perms;
	}

    public function GetProfile()
	{
		return $this->hasOne(UserProfile::class,'id','profile_id');
	}

    public function hasPermissions($req_keys){
		$user_perms = collect($this->getPermissions());
		// return (bool)$user_perms->intersect($req_keys)->count(); // Se quitaron las llaves que rodeaban a $req_keys - 2021-10-06
		return (bool)$user_perms->intersect($req_keys)->count() ;
	}
}
