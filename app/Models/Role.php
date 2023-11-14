<?php

namespace App\Models;



use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{

    protected $fillable = [
        'name',
        'guard_name',
        'business_id',
        'is_default',
        "is_system_role"

    ];
    protected $guard_name = 'api';

}
