<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    protected $fillable = [
        'parent_id',
        'key',
        'route',
        'route_slug',
        'label',
        'icon',
        'svg',
        'order',
        'is_active',
        'params',
        'type',
        'extension',
        'letter_icon',
        'letter_icon_bg'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'params' => 'array',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeParent($query)
    {
        return $query->whereNull('parent_id');
    }
}
