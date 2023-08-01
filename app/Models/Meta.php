<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [
        'metaable_type',
        'metaable_id',
        'key',
        'value',
        'is_json',
    ];

    public function metaable(): MorphTo
    {
        return $this->morphTo();
    }

}
