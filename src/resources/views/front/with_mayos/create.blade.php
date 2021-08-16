<?php
$title = '投稿';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-header">明太マヨのさらなる魅力を伝える</div>
<div class="card-body">
    {{ Form::open(['route' => 'front.with_mayos.store']) }}
        <div class="form-group row">
            {{ Form::label('title', '明太マヨに合うもの', ['class' => 'col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::text('title', null, [
                    'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'required'
                ]) }}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('body', 'その理由', ['class' => 'col-form-label']) }}
            <div class="col-sm-10">
                {{ Form::textarea('body', null, [
                    'class' => 'form-control' . ($errors->has('body') ? ' is-invalid' : ''), 'rows' => 5, 'required'
                ]) }}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">投稿</button>
              {{ link_to_route('front.with_mayos.index', '一覧へ戻る', null, ['class' => 'btn btn-secondary']) }}
          </div>
      </div>
    {{ Form::close() }}
</div>
@endsection
