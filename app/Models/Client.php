<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Scopes\AncientScope;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'email'];

    public function appforms(): HasMany
    {
        return $this->hasMany(AppForm::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new AncientScope);
    }
}
