<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    use HasFactory;
    public function submenus()
    {
        return $this->hasMany(SubMenu::class, 'menuid')->orderBy('sub_menus.sortno');
    }
    public function permissions()
    {
        return $this->hasMany(Permission::class, 'menuid')->orderBy('permissions.sortno');
    }
    public function scopeAllMenu()
    {
        return DB::table('menus', 'm')
            ->join('sub_menus as s', 's.menuid', '=', 'm.id')
            ->orderBy('m.sortno')
            ->orderBy('s.sortno')
            ->select(['m.id as menuid', 'm.module', 'm.label as menulabel', 'm.icon as menuicon', 's.label as sublabel', 's.route']);
    }
    public function scopeRoleMenu()
    {
        return DB::table('menus', 'm')
            ->join('sub_menus as s', 's.menuid', '=', 'm.id')
            ->join('role_menus as rm','rm.submenuid','=','s.id')
            ->orderBy('m.sortno')
            ->orderBy('s.sortno')
            ->select(['m.id as menuid', 'm.module', 'm.label as menulabel', 'm.icon as menuicon', 's.label as sublabel', 's.route']);
    }
}
