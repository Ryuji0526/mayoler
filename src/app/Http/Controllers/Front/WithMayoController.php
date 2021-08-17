<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\WithMayoRequest;
use App\Models\WithMayo;
use App\Models\MayoTag;

class WithMayoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['store', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($mayo_tag_slug = null)
    {
        $with_mayos = WithMayo::publicList($mayo_tag_slug);
        $mayo_tags = MayoTag::all();

        return view('front.with_mayos.index', compact('with_mayos', 'mayo_tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mayo_tags = MayoTag::pluck('name', 'id')->toArray();
        return view('front.with_mayos.create', compact('mayo_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WithMayoRequest $request)
    {
        $with_mayo = WithMayo::create($request->all());
        $with_mayo->mayo_tags()->attach($request->mayo_tags);

        if ($with_mayo) {
            return redirect()
                ->route('front.with_mayos.index', $with_mayo)
                ->withSuccess('皆さんに新たなマヨの素晴らしさを伝えました。');
        } else {
            return redirect()
                ->route('front.with_mayos.create')
                ->withError('投稿に失敗しました。');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WithMayo  $withMayo
     * @return \Illuminate\Http\Response
     */
    public function destroy(WithMayo $with_mayo)
    {
        $with_mayo->mayo_tags()->detach();

        if ($with_mayo->delete()) {
            $flash = ['success' => '投稿を削除しました。'];
        } else {
            $flash = ['error' => '投稿の削除に失敗しました。'];
        }

        return redirect()
            ->back()
            ->with($flash);
    }
}
