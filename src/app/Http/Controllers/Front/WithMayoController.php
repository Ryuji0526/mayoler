<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\WithMayoRequest;
use App\Models\WithMayo;

class WithMayoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $with_mayos = WithMayo::publicList();

        return view('front.with_mayos.index', compact('with_mayos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('front.with_mayos.create');
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

        if ($with_mayo) {
            return redirect()
                ->route('front.with_mayos.index')
                ->withSuccess('皆さんに新たな明太マヨの素晴らしさを伝えました。');
        }else {
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
        if($with_mayo->delete()) {
            $flash = ['success' => '投稿を削除しました。'];
        } else {
            $flash = ['error' => '投稿の削除に失敗しました。'];
        }

        return redirect()
            ->back()
            ->with($flash);
    }
}
