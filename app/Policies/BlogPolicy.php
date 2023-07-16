<?php

namespace App\Policies;

use App\Enums\PermissionEnums;
use App\Models\Blog;
use App\Models\Role;
use App\Models\User;
use Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Middleware\Authorize;

class BlogPolicy
{
    public function __construct()
    {

    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Blog $blog): bool
    {
        return $user->hasRole('admin') && $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Blog $blog): bool
    {
        return $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Blog $blog): bool
    {
        return $user->hasRole('admin') && $user->id === $blog->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Blog $blog): bool
    {
        return Gate::allows('can', 'blog_restore');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Blog $blog): bool
    {
        //
    }
}
