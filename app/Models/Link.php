<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin Builder
 */

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;
    protected $fillable = [
        'title',
        'original_url',
        'redirect_ulid',
        'user_id',
    ];
    public function getRedirectUrlAttribute(): string
    {
        return url($this->redirect_ulid);
    }

    public function transitions()
    {
        return $this->hasMany(LinkTransitions::class, 'link_id');
    }

    public function getTransitionsCountAttribute(): int
    {
        return $this->transitions()->count();
    }
}
