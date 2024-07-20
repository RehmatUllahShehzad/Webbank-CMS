<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Topdot\Core\Contracts\HasStatus;
use Topdot\Core\Traits\WithUniqueId;
use Illuminate\Database\Eloquent\Model;
use LaravelJsonColumn\Traits\JsonColumn;
use Illuminate\Database\Eloquent\Builder;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model implements HasMedia, HasStatus
{
  
    use HasFactory,
    JsonColumn,
    WithUniqueId,
    InteractsWithMedia;

    protected $table = 'testimonials';
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


}
