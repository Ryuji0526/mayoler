<?php
$title = '投稿';
?>
@extends('front.layouts.app')

@section('content')
<div class="card-header">マヨのさらなる魅力を伝える</div>
<div class="card-body">
    {{ Form::open(['route' => 'front.with_mayos.store']) }}
        <div class="form-group row mx-auto">
            {{ Form::label('mayo_tags', 'タグ', ['class' => 'col-lg-2 control-label']) }}
            <div class="col">
                <div class="{{ $errors->has('mayo_tags.*') ? 'is-invalid' : '' }}">
                    @foreach ($mayo_tags as $key => $mayo_tag)
                        <div class="form-check form-check-inline">
                            {{ Form::checkbox( 'mayo_tags[]', $key, null, ['class' => 'form-check-input', 'id' => 'mayo_tag'.$key]) }}
                            <label class="form-check-label" for="mayo_tag{{$key}}">{{ $mayo_tag }}</label>
                        </div>
                    @endforeach
                </div>
                @error('mayo_tags.*')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mx-auto">
            {{ Form::label('title', '明太マヨに合うもの', ['class' =>'col-lg-2 col-form-label']) }}
            <div class="col">
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
        <div class="form-group row mx-auto">
            {{ Form::label('body', 'その理由', ['class' => 'col-lg-2 col-form-label']) }}
            <div class="col">
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
