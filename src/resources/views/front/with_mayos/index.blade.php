<?php
$title = 'with_mayos';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-body">
    @if($with_mayos->count() <= 0)
        <p>投稿はありません。</p>
    @else
        @foreach($with_mayos as $with_mayo)
        <div class="card mx-auto" style="max-width: 30rem;">
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
        <div class="d-flex justify-content-center mt-3">
            {{ $with_mayos->links() }}
        </div>
    @endif
</div>
@endsection
