<?php

namespace Topdot\Slider\Models;

use Spatie\Sluggable\HasSlug;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Sluggable\SlugOptions;
use Topdot\Core\Contracts\HasStatus;
use Topdot\Core\Traits\WithUniqueId;
use Illuminate\Database\Eloquent\Model;
use LaravelJsonColumn\Traits\JsonColumn;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model implements HasMedia, HasStatus
{
    use HasFactory,
        JsonColumn,
        WithUniqueId,
        InteractsWithMedia,
        HasSlug;

    protected $table = 'slider';
    protected $guarded = [];

    public function scopeActive(Builder $builder)
    {
        return $builder->where('is_active', true);
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
        if ( $this->slug && strlen($this->slug) >= 0 ){
            $options->preventOverwrite();
        }

        return $options;
    }
}
