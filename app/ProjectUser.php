<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProjectUser extends Pivot
{
    public function role()
    {
        return Role::find($this->role_id);
    }

    public function isAllowedTo($ability)
    {
        if (is_string($ability)) {
            $ability = Ability::where('slug', $ability)->first();
        }
        return $this->role()->abilities->contains($ability);
    }
}
