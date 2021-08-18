<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class WithMayo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'is_public'
    ];

    protected $casts = [
        'is_public' => 'bool'
    ];

    protected static function boot()
    {
        parent::boot();

        self::saving(function ($with_mayos) {
            $with_mayos->user_id = \Auth::id();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function mayo_tags()
    {
        return $this->belongsToMany(MayoTag::class, 'with_mayo_mayo_tag');
    }

    public function scopePublic(Builder $query)
    {
        return $query->where('is_public', true);
    }

    public function scopeWithUser(Builder $query)
    {
        return $query->with('user');
    }

    public function scopeWithLikes(Builder $query)
    {
        return $query->with('likes');
    }

    public function scopePublicList(Builder $query, string $mayo_tag_slug = null)
    {
        if ($mayo_tag_slug) {
            $query->whereHas('mayo_tags', function ($query) use ($mayo_tag_slug) {
                $query->where('slug', $mayo_tag_slug);
            });
        }
        return $query
            ->with('mayo_tags')
            ->public()
            ->withUser()
            ->withLikes()
            ->latest('created_at')
            ->paginate(20);
    }

    public function scopePublicFindById(Builder $query, int $id)
    {
        return $query->public()->findOrFail($id);
    }

    public function getCreatedFormatAttribute()
    {
        return $this->created_at->format('Y年m月d日');
    }

    public function isLikedByAuthUser()
    {
        $id = \Auth::id();

        $likers = array();
        foreach ($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
        } else {
            return false;
        }
    }
}
