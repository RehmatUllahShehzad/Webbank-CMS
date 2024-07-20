<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Topdot\Core\Contracts\HasStatus;
use Topdot\Core\Traits\WithUniqueId;
use LaraEditor\App\Contracts\Editable;
use LaraEditor\App\Traits\EditableTrait;
use LaravelJsonColumn\Traits\JsonColumn;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use \Illuminate\Support\Str;

class News extends Model implements HasStatus
{
    use HasFactory,
        HasSlug,
        WithUniqueId;

    protected $guarded = [];

    protected $casts = [
        'date' => 'date',
    ];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('is_active', true);
    }

    public function getDescription($limit)
    {
        return  Str::words(strip_tags($this->description), $limit, '');
    }

    public function isActive(): bool
    {
        return $this->is_active;
    }

    public function markActive($active = true)
    {
        $this->update([
            'is_active' => $active
        ]);
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return is_numeric($value) ? self::query()->where('id', $value)->firstOrFail() : $this->where('slug', $value)->orWhere('title', $value)->firstOrFail();
    }

    public function getSlugOptions(): SlugOptions
    {
        $options = SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
        if ($this->slug && strlen($this->slug) >= 0) {
            $options->preventOverwrite();
        }

        return $options;
    }
}
