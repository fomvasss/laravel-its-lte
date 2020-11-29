@include('lte::fields.field-checkbox', [
    'label' => 'Активный',
    'field_name' => 'active',
    'status' => isset($user) ? $user->active : 1,
])

@if(!empty($user->data['password']))
<div class="callout callout-warning">
    <h4>Внимание!</h4>
    <p>Для пользователя автоматически сгенерирован пароль: <strong>{{ $user->data['password'] }}</strong></p>
</div>
@endif

<div class="form-group @error('name') has-error @enderror">
    {!! Form::label('name', 'Имя', ['class' => 'control-label',]) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Bill']) !!}
    @error('name') <p class="help-block">{{ $message }}</p>@enderror
</div>
<div class="form-group @error('lastname') has-error @enderror">
    {!! Form::label('lastname', 'Фамилия', ['class' => 'control-label',]) !!}
    {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Gates']) !!}
    @error('lastname') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('email') has-error @enderror">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    @error('email') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('phone') has-error @enderror">
    {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
    @error('phone') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('password') has-error @enderror">
    {!! Form::label('password', 'Новый пароль', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @error('password') <p class="help-block">{{ $message }}</p>@enderror
</div>

<div class="form-group @error('password_confirmation') has-error @enderror">
    {!! Form::label('password_confirmation', 'Подтверждение пароля', ['class' => 'control-label',]) !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control',]) !!}
    @error('password_confirmation') <p class="help-block">{{ $message }}</p>@enderror
</div>

@include('lte::fields.field-select2-static', [
    'label' => 'Роль',
    'field_name' => 'roles',
    'multiple' => 1,
    'max' => 1,
    'disabled' => 0,
    'required' => 1,
    'attributes' => ['Клиент' => 'client'],
    'selected' => 'client',
    'old' => old('roles')
])

@include('lte::fields.field-form-buttons', [
    //'url_store_and_create' => route('admin.users.create'),
    //'url_store_and_close' => session('admin.users.index'),
    //'url_destroy' => isset($user) ? route('admin.users.destroy', $user) : '',
    //'url_after_destroy' => session('admin.users.index'),
    'url_close' => session('admin.users.index'),
])
