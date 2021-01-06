<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('lte::main.Password') }}</h3>
    </div>
    <form role="form" method="POST" action="{{ route('user-password.update') }}">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group @error('current_password') has-error @enderror">
                <label>{{ trans('lte::main.Current password') }}</label>
                <input type="password" name="current_password" required autocomplete="current-password" class="form-control">
                @error('current_password')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <label>{{ trans('lte::main.New Password') }}</label>
                <input type="password" name="password" required autocomplete="new-password" class="form-control">
                @error('password')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('password') has-error @enderror">
                <label>{{ trans('lte::main.Confirm password') }}</label>
                <input type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
            </div>
        </div>

        <div class="box-footer">
            @include('lte::fields.field-form-buttons')
        </div>
    </form>
</div>
