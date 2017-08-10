<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by PhpStorm.
 * @author Rivalani Simon Hlengani
 * @since 2017/08/05
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property string $email
 * @property string $username
 * @property int $role_id
 * @property string password
 * @property mixed $role
 * @property bool active
 * Time: 1:24 PM
 */

class User extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return  $this->belongsTo(Role::class);
    }
}