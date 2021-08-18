<?php
$title = '投稿';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-header">マヨのさらなる魅力を伝える</div>
<div class="card-body">
    @include('front.with_mayos._createForm')
</div>
@endsection
