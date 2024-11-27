<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Scopes\AncientScope;

class AppForm extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'info' => 'hashed',
        ];
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new AncientScope);
    }
}
