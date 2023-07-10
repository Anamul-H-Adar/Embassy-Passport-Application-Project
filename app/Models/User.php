<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, HasRoles,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table="users";

    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'phone',
        'avater',
        'bio',
        'company_name',
        'location',
        'website',
    ];

    protected static $logAttributes = ['name', 'email','phone','bio','company_name','location','website'];
    protected static $logName = 'user';
    protected static $logOnlyDirty = true;
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

    public function lastlogin()
    {
        return UserActivity::where('user_id',$this->id)->orderBy('id','DESC')->first();
    }
    
    public function module_permission($module)
    {
        if(auth()->user()->hasRole('Super-Admin')){
            $status = true;
            return $status;
        }
        $permissions = auth()->user()->getAllPermissions();
        $modules =  $permissions->map(function ($permissions) {
            return $permissions->module;
        })->toArray();

        return in_array($module, $modules);
    }
}
