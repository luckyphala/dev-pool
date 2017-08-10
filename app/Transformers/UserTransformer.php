<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['role'];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id'=>$user->id,
            'name' => $user->name,
            'username'=>$user->username,
            'email' => $user->email
        ];
    }

    public function includeRole(User $user)
    {
        $role = $user->role;

        return $this->item($role, new RoleTransformer());
    }
}
