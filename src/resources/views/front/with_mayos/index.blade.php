<?php
$title = 'with_mayos';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-body">
    @if($with_mayos->count() <= 0)
        <p>投稿はありません。</p>
    @else
        @guest
        @else
            <ul class="nav nav-pills mb-2 text-nowrap flex-nowrap overflow-auto small" style="height: 50px;">
                <li class="nav-item">
                    {{ link_to_route('front.with_mayos.index', 'すべて', null, [
                        'class' => 'nav-link'.
                        (request()->segment(3) === null ? ' active' : '')
                    ]) }}
                </li>
                @foreach($mayo_tags as $mayo_tag)
                    <li class="nav-item">
                        {{ link_to_route('front.with_mayos.index.mayo_tag', $mayo_tag->name, $mayo_tag->slug, [
                            'class' => 'nav-link'.
                            (request()->segment(3) === $mayo_tag->slug ? ' active' : '')
                        ]) }}
                    </li>
                @endforeach
            </ul>
        @endguest
        <div class="overflow-auto mx-auto" style="height: 75vh; max-width:30rem;">
            @foreach($with_mayos as $with_mayo)
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            {!! link_to_route('front.users.show', $with_mayo->user->name, $with_mayo->user->id, [ 'class' => 'text-body' ]) !!}
                        </div>
                        <div class="col text-right small align-items-bottom">{{ $with_mayo->created_format }}</div>
                    </div>
                    @include('front.with_mayos._post')
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3">
            {{ $with_mayos->links() }}
        </div>
    @endif
</div>
@endsection
