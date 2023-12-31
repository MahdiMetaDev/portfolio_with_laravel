<?php

namespace App\Traits;


use Illuminate\Support\Str;

trait HasUuid
{
    protected static function bootHasUuid(): void
    {
        static::creating(function ($item) {
            $item->uuid = Str::uuid();
        });
    }
}
