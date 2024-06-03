<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    const add_user = "add_user";
    const edit_user = "edit_user";
    const reset_password = "reset_password";
    const add_department = "add_department";
    const edit_department = "edit_department";
    const add_role = "add_role";
    const edit_role = "edit_role";
    const edit_programme = "programme_edit";
    const add_programme= "programme_add";
    const edit_course = "course_edit";
    const add_course = "course_add";

    }
