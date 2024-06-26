<?php

namespace App\Models;

use App\Models\master\Role as MasterRole;
use App\Models\Master\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected $guarded = [];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    ];

    //Scope
    public function scopeList()
    {
        return DB::table('users', 'u')
            ->join('roles as r', 'r.id', '=', 'u.roleid')
             ->join('departments as d', 'd.id', '=', 'u.departmentid')
            ->join('programmes as pro', 'pro.id', '=', 'u.programmeid')
            ->select(['u.*', 'r.name as rolename','d.name as departmentname','pro.name as pname'])
            ->selectRaw("concat(u.fname,' ',u.lname) as fullname")
            ->selectRaw("TIMESTAMPDIFF (YEAR, u.dob, CURDATE()) as age")
            ->orderBy("fullname");
    }

    //relations
    public function roles()
    {
        return $this->belongsTo(Role::class,'roleid');
    }

    //attributes
    public function getIsAdminAttribute()
    {
        return $this->roleid == 1;
    }
    public function getFullnameAttribute()
    {
        return $this->fname .' '.$this->mname .' '.$this->lname;
    }
}
