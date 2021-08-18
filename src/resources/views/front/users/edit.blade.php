<?php
$title = 'ユーザー編集';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-header">ユーザー編集</div>
<div class="card-body">
    @if($user->isAdminOrSample())
        <div class="text-danger">サンプルユーザーのため、変更できません。</div>
    @endif
    @include('front.users._editForm', ['data' => $user])
</div>
@endsection