<?php
$title = 'ユーザー詳細';
?>
@extends('front.layouts.app')
 
@section('content')
<div class="card-body d-flex">
    <span>
        {{ $user->name }}
    </span>
    @if($user->id === Auth::id())
        <span class="ml-auto">
            {{ link_to_route('front.users.edit', '編集', Auth::id(), ['class' => 'nav-link py-0']) }}
        </span>
    @endif
</div>
<div class="card-body">
    @if($with_mayos->count() <= 0)
        <div>
            <p>投稿はありません。</p>
        </div>
    @else
        <div class="overflow-auto mx-auto" style="height: 75vh; max-width: 30rem;">
            @foreach($with_mayos as $with_mayo)
                <div class="card">
                    <div class="card-body">
                        <div class="col text-right small align-items-bottom">{{ $with_mayo->created_format }}</div>
                        @include('front.with_mayos._post', ['data' => $with_mayo])
                        @if($user->id === Auth::id())
                            <div class="text-right">
                                {{ Form::model($with_mayo, [
                                    'route' => ['front.with_mayos.destroy', $with_mayo],
                                    'method' => 'delete'
                                    ]) }}
                                    {{ Form::submit('削除', [
                                        'onclick' => "return confirm('本当に削除しますか?')",
                                        'class' => 'btn btn-danger btn-sm m-1'
                                    ]) }}
                                {{ Form::close() }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {!! $with_mayos->links() !!}
        </div>
  @endif
</div>
@endsection