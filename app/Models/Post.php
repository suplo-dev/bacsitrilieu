<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $thumbnail_url
 * @property mixed $relatedPosts
 * @property mixed $fake_view
 * @property mixed $real_view
 */
class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'thumbnail_url',
        'body',
        'fake_view',
        'real_view',
    ];

    protected $appends = ['total_view'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getTotalViewAttribute(): int
    {
        return $this->fake_view + $this->real_view;
    }
    public function relatedPosts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id', 'category_id');
    }

}
