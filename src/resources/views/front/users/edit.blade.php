<?php
$title = 'ユーザー編集';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-header">ユーザー編集</div>
<div class="card-body">
    @if($user->role === 1 || $user->email === 'nonadmin@mayoler.com')
        <div class="text-danger">サンプルユーザーのため、変更できません。</div>
    @endif
    {{ Form::open(['route' => ['front.users.update', $user->id], 'method' => 'put']) }}
        <div class="form-group row mx-auto">
            {{ Form::label('name', '名前', ['class' =>'col-lg-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('name', $user->name, [
                    'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', ($user->role === 1 || $user->email === 'nonadmin@mayoler.com' ? 'disabled' : '')
                ]) }}
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row mx-auto">
            {{ Form::label('email', 'メールアドレス', ['class' => 'col-lg-2 col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('email', $user->email, [
                    'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', ($user->role === 1 || $user->email === 'nonadmin@mayoler.com' ? 'disabled' : '')
                ]) }}
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 text-right">
                {{ link_to_route('front.users.show', '戻る', $user->id, ['class' => 'btn btn-secondary']) }}
                <button type="submit" class="btn btn-primary">編集</button>
            </div>
    </div>
    {{ Form::close() }}
</div>
@endsection