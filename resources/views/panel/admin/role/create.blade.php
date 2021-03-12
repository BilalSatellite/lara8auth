@extends('panel.master')

@section('tital', 'Create Role')


@section('content')

<div class="">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>


<div class="">
    <a class="btn btn-success" href="{{ route('role.index') }}"> Roles list</a>
</div>
</div>

</div>
<div class="card-body">

    <form method="POST" action="{{ route('role.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name :') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
          {{-- @isset($create) --}}

          {{-- <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password :') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div> --}}
        {{-- @endisset --}}
        <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Permission :') }}</label>
            <div class="col-md-6">
                @foreach ($roles as $role)
                <div class="form-check">
                    <label class="form-check-label" for="{{ $role->name }}">
                        <input type="checkbox" class="form-check-input" name="roles[]" id="{{ $role->name }}"
                            value="{{ $role->id }}" @isset($user) @if (in_Array($role->id,
                        $user->roles->pluck('id')->toArray())) checked @endif @endisset>
                        {{ $role->name }}
                    </label>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>



</div>



@endsection