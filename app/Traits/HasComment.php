<?php

namespace App\Traits;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasComment
{
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function leaveComments(User $user, $type)
    {
        if ($type === Blog::class) {
            $this->comments()->create([
                'user_id' => $user->id,
                'title' => 'something',
                'body' => 'hello from a test comment',
                'published' => true
            ]);
        }
    }
}
