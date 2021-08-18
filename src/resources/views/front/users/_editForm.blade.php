{{ Form::open(['route' => ['front.users.update', $data->id], 'method' => 'put']) }}
<div class="form-group row mx-auto">
    {{ Form::label('name', '名前', ['class' =>'col-lg-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name', $data->name, [
            'class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required', ($data->isAdminOrSample() ? 'disabled' : '')
        ]) }}
        @error('name')
            <div class="invalid-feedback">
                {!! $message !!}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row mx-auto">
    {{ Form::label('email', 'メールアドレス', ['class' => 'col-lg-2 col-form-label']) }}
    <div class="col-sm-10">
        {{ Form::text('email', $data->email, [
            'class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'required', ($data->isAdminOrSample() ? 'disabled' : '')
        ]) }}
        @error('email')
            <div class="invalid-feedback">
                {!! $message !!}
            </div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-10 text-right">
        {{ link_to_route('front.users.show', '戻る', $data->id, ['class' => 'btn btn-secondary']) }}
        <button type="submit" class="btn btn-primary">編集</button>
    </div>
</div>
{{ Form::close() }}