@if(!empty($user->data['password']))
    <div class="callout callout-warning">
        <h4>{{ trans('lte::main.Attention!') }}</h4>
        <p>{{ trans('lte::main.A password is automatically generated for the user:') }} <strong>{{ $user->data['password'] }}</strong></p>
    </div>
@endif

@include('lte::fields.field-image-uploaded',[
    'label' => 'Avatar',
    'field_name' => 'avatar',
    'entity' => isset($user) ? $user : null,
])

@include('lte::fields.field-select2-static', [
    'label' => trans('lte::main.Status'),
    'field_name' => 'status',
    'attributes' => ['active' => 'Active'],
    'selected' => isset($user) ? $user->status : null,
    'old' => old('status')
])
{{--
@include('lte::fields.field-checkbox', [
    'label' => trans('lte::main.active'),
    'field_name' => 'is_active',
    'status' => isset($user) ? $user->is_active : 1,
])
--}}

<div class="form-group @error('name') has-error @enderror">
    {!! Form::label('name', trans('lte::main.Name'), ['class' => 'control-label',]) !!}
    {!! Form::text('name', null, ['class' => 'form-control',]) !!}
    @error('name') <p class="help-block">{{ $message }}</p>@enderror
</div>
<div class="form-group @error('lastname') has-error @enderror">
    {!! Form::label('lastname', trans('lte::main.Lastname'), ['class' => 'control-label',]) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control',]) !!}
    @error('lastname') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('email') has-error @enderror">
    {!! Form::label('email', trans('lte::main.Email'), ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @error('email') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('phone') has-error @enderror">
    {!! Form::label('phone', trans('lte::main.Phone'), ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    @error('phone') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('password') has-error @enderror">
    {!! Form::label('password', trans('lte::main.Password'), ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @error('password') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('password_confirmation') has-error @enderror">
    {!! Form::label('password_confirmation', trans('lte::main.Password confirmation'), ['class' => 'control-label',]) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control',]) !!}
    @error('password_confirmation') <p class="help-block">{{ $message }}</p>@enderror
</div>

@include('lte::fields.field-select2-static', [
    'label' => trans('lte::main.Role'),
    'field_name' => 'roles',
    'multiple' => 1,
    'max' => 1,
    'disabled' => 0,
    'required' => 1,
    'attributes' => ['Client' => 'Admin', 'Client' => 'client'],
    'selected' => 'client',
    'old' => old('roles')
])

@include('lte::fields.field-form-buttons')
