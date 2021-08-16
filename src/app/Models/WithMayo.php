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
    
        // 保存時user_idをログインユーザーに設定
        self::saving(function($with_mayos) {
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

    public function scopePublicList(Builder $query)
    {
        return $query
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

    public function is_liked_by_auth_user()
    {
        $id = \Auth::id();

        $likers = array();
        foreach($this->likes as $like) {
            array_push($likers, $like->user_id);
        }

        if (in_array($id, $likers)) {
            return true;
          } else {
            return false;
          }
    }
}
