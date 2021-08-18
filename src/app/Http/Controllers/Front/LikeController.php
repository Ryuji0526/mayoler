<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\WithMayo;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function like(Request $request)
    {
        $user_id = \Auth::id();
        $with_mayo_id = $request->with_mayo_id;
        $already_liked = Like::where('user_id', $user_id)->where('with_mayo_id', $with_mayo_id)->first();

        if (!$already_liked) {
            $like = new Like();
            $like->with_mayo_id = $with_mayo_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('with_mayo_id', $with_mayo_id)->where('user_id', $user_id)->delete();
        }
        $with_mayo_likes_count = WithMayo::withCount('likes')->findOrFail($with_mayo_id)->likes_count;
        $param = [
            'with_mayo_likes_count' => $with_mayo_likes_count,
        ];
        return response()->json($param);
    }
}
