<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('lte::main.Data') }}</h3>
    </div>
    <form role="form" method="POST" action="#">
        @csrf
        <div class="box-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">{{ trans('lte::main.Name') }}</label>
                <input type="text" value="{{ old('name') ?? auth()->user()->name }}" required autofocus autocomplete="name" class="form-control" id="name" >
                @error('name')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('email') has-error @enderror">
                <label for="name">{{ trans('lte::main.Email') }}</label>
                <input type="email" value="{{ old('email') ?? auth()->user()->email }}" required autocomplete="email" class="form-control" id="email" >
                @error('email')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group @error('password') has-error @enderror">
                <label>{{ trans('lte::main.Password') }}</label>
                <input type="password" name="password" autocomplete="new-password" class="form-control">
                @error('password')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <label>{{ trans('lte::main.Confirm password') }}</label>
                <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
            </div>
        </div>

        <div class="box-footer">
            @include('lte::fields.field-form-buttons')
        </div>
    </form>
</div>
