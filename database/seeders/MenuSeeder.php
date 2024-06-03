<?php

namespace Database\Seeders;

use App\Models\master\Menu;
use App\Models\master\Permission;
use App\Models\master\SubMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'label' => 'Main Masters', 'icon' => 'ri-settings-2-line',
                'module' => 'admin',
                'subs' => [
                     ['label' => 'Users', 'route' => 'user-list'],
                    ['label' => 'Roles', 'route' => 'role-list'],
                    ['label' => 'programmes', 'route' => 'programme-list'],
                    ['label' => 'courses', 'route' => 'course-list'],
                  ],
                'permissions' => [
                    //users
                    ['label' => 'Add user', 'action' => Permission::add_user, 'description' => 'Add user', 'group' => 'user'],
                    ['label' => 'Edit user', 'action' => Permission::edit_user, 'description' => 'Edit user', 'group' => 'user'],
                    ['label' => 'Reset password', 'action' => Permission::reset_password, 'description' => 'Reset user password', 'group' => 'user'],
                    //roles
                    ['label' => 'Add role', 'action' => Permission::add_role, 'description' => 'Add role', 'group' => 'role'],
                    ['label' => 'Edit role', 'action' => Permission::edit_role, 'description' => 'Edit role', 'group' => 'role'],
                    ['label' => 'Edit programme', 'action' => Permission::edit_programme, 'description' => 'Edit programme', 'group' => 'programme'],
                    ['label' => 'Add programme', 'action' => Permission::add_programme, 'description' => 'add programme', 'group' => 'programme'],
                    ['label' => 'Edit course', 'action' => Permission::edit_course, 'description' => 'Edit course', 'group' => 'course'],
                    ['label' => 'Add course', 'action' => Permission::add_course, 'description' => 'Add course', 'group' => 'course'],


                ]

            ]
        ];
        foreach ($menus as $mindex => $m) {
            $subs = $m['subs'];
            $permissions = $m['permissions'];
            unset($m['subs'], $m['permissions']);

            $m['sortno'] = $mindex;
            $menu = Menu::query()->create($m);
            //submenus
            foreach ($subs as $sindex => $sub) {
                $sub['menuid'] = $menu->id;
                $sub['sortno'] = $sindex;
                SubMenu::query()->create($sub);
            }
            //permissions
            foreach ($permissions as $pindex => $perm) {
                $perm['menuid'] = $menu->id;
                $perm['sortno'] = $pindex;
                Permission::query()->create($perm);
            }
        }
    }
}
