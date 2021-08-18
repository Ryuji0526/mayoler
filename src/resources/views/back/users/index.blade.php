<?php
$title = 'users';
?>
@extends('back.layouts.app')

@section('content')
<div class="card-body">
    @foreach($users as $user)
        <div class="card mx-auto" style="max-width: 30rem;">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        {!! link_to_route('front.users.show', $user->name, $user->id, [ 'class' => 'text-body' ]) !!}
                    </div>
                </div>
                @if($user->id !== Auth::id())
                    <div class="text-right">
                        {{ Form::model($user, [
                        'route' => ['back.users.destroy', $user],
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
    <div class="d-flex justify-content-center mt-3">
        {{ $users->links() }}
    </div>
</div>
@endsection