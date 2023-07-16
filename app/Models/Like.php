<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'likeable_id', 'likeable_type'];

    public function likeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getTitleAttribute()
    {
//        return match ($this->likeable_type) {
//            User::class => $this->likeable->name,
//            default => $this->likeable->title,
//        };
        switch ($this->likeable_type) {
            case Blog::class:
                return $this->likeable->title;
            case User::class:
                return $this->likeable->name;
        }
    }

    protected $appends = ['title'];
}
