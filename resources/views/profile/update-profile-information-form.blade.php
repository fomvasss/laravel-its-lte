<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ trans('lte::main.Data') }}</h3>
    </div>
    <form role="form" method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">{{ trans('lte::main.Name') }}</label>
                <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" required autofocus autocomplete="name" class="form-control" id="name" >
                @error('name')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group @error('email') has-error @enderror">
                <label for="name">{{ trans('lte::main.Email') }}</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" required autocomplete="email" class="form-control" id="email" >
                @error('email')
                <span class="help-block">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

        </div>

        <div class="box-footer">
            @include('lte::fields.field-form-buttons')
        </div>
    </form>
</div>
