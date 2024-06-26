<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleMenu extends Model
{
    use HasFactory;
    public function scopeList()
    {
        return DB::table('role_menus','rm')
            ->join('roles as r','r.id','=','rm.roleid')
            ->join('sub_menus as s','s.id','=','rm.submenuid');
    }
}
