<?php

namespace App\Models;

use App\Traits\HasLike;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Laravel\Sanctum\HasApiTokens;
use function PHPUnit\Framework\isNull;

/**
 * @method hasPermission(mixed[] $permission_names)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasLike, HasUuid;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'uuid',
        'name',
        'family',
        'gender',
        'email',
        'password',
        'active'
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn(string $value) => \Str::upper($value),
        );
    }

    public function getMyFullNameAttribute(): string
    {
        return $this->name . ' ' . $this->family;
    }

    protected $appends = ['my_full_name'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'active' => 'boolean'
    ];

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function hasRole($role): bool
    {
        return $this->roles()->where('name', $role)->exists();
    }

    public function scopeHasPermission(Builder $query, array $permission_names): Builder
    {
        return $query->whereHas('roles', function ($q) use ($permission_names) {
            $q->whereHas('permissions', function ($qq) use ($permission_names) {
                $qq->whereIn('name', $permission_names);
            });
        });
    }

    public function hasPermissionsTo($permission_name): bool
    {
        return User::where('id', $this->id)->whereHas('roles', function ($q) use ($permission_name) {
            $q->whereHas('permissions', function ($qq) use ($permission_name) {
                $qq->where('name', $permission_name);
            });
        })->exists();

//        $permission = Permission::where('name', $permission_name)->first();
//
//        if (!$permission) {
//            return false;
//        }
//
//        $role_names = $permission->roles()->pluck('name');
//
//        foreach ($role_names as $role_name) {
//            if ($this->hasRole($role_name)) {
//               return true;
//            }
//        }
//
//        return false;
    }

    public function myLikes(): HasMany
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function metas(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metaable');
    }
}
