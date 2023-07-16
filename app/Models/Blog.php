<?php

namespace App\Models;

use App\Traits\HasComment;
use App\Traits\HasLike;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Blog extends Model
{
    use HasFactory, HasComment, HasLike;

    protected $fillable = [
        'user_id', 'title', 'description', 'published',
    ];

    protected function title(): Attribute
    {
        return new Attribute(
            get: fn(string $value) => \Str::upper($value),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
