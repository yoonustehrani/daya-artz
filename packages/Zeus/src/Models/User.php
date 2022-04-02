<?php

namespace Zeus\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'zeus_' . 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'lang'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'zeus_permission_user');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'zeus_role_user');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
     * Checks if the related user has the given permission key
     * @param string $key
     * @return bool
     */
    public function has_permission($key)
    {
        $permissions = $this->current_permissions;
        if ($permissions->count()) {
            if (is_string($key)) {
                return $permissions->search($key, true) !== false;
            }
            if (is_array($key)) {
                return $permissions->intersect($key)->count() === count($key);
            }
        }
        return false;
    }

    public function getCurrentPermissionsAttribute()
    {
        $session_key = 'user_' . $this->getKey() . '@abilities';
        if (request()->session()->has($session_key)) {
            return request()->session()->get($session_key);
        }
        return collect([]);
    }

    public function getFullnameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Check if this user has the given role(s)
     * @param string|array $niddle
     * @return bool
     */
    public function has_role($given)
    {
        if (is_string($given)) {
            return ($this->role ? $this->role->key === $given : false) || $this->roles->contains('given');
        }
        return $this->has_roles($given);
    }
    /**
     * @param array $keys
     */
    public function has_roles($keys)
    {
        return $this->roles->whereIn('key', $keys)->count() === count($keys);
    }

    public function getAsTextAttribute()
    {
        return "{$this->email} - {$this->fullname}";
    }
}