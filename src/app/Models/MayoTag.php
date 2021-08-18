<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MayoTag extends Model
{
    use HasFactory;

    public function with_mayos()
    {
        return $this->belongsToMany(WithMayo::class, 'with_mayo_mayo_tag');
    }
}
