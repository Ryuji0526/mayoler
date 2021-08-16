<?php
$title = 'user';
?>
@extends('front.layouts.app')
 
@section('content')
<div>
    <div class="card-body">{{ $user->name }}</div>
</div>
<div class="card-body">
    @if($with_mayos->count() <= 0)
        <div>
            <p>投稿はありません。</p>
        </div>
    @else
        @foreach($with_mayos as $with_mayo)
            <div class="card mx-auto" style="max-width: 30rem;">
                <div class="card-body">
                    <div class="col text-right small align-items-bottom">{{ $with_mayo->created_format }}</div>
                    <div>{{ $with_mayo->title }}</div>
                    <div>{{ $with_mayo->body }}</div>
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
        <div class="d-flex justify-content-center">
            {{ $with_mayos->links() }}
        </div>
  @endif
</div>
@endsection