@extends('panel.master')
@section('tital', 'Add User')

@section('content')

<div class="">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>


            <div class="">
                <a class="btn btn-success" href="{{ route('alluser.index') }}"> User list</a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('alluser.store') }}">
         {{-- @include('panel.admin.include.form',['create'=>true]) --}}
         @csrf

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name') }}@isset($user){{ $user->name }}@endisset"  required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}@isset($user){{ $user->email }}@endisset" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
{{-- @isset($create) --}}

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
{{-- @endisset --}}
<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

    <div class="col-md-6">
        @foreach ($roles as $role)
        <div class="form-check">
            <label class="form-check-label" for="{{ $role->name }}">
                <input type="checkbox" class="form-check-input" name="roles[]" id="{{ $role->name }}"
                    value="{{ $role->id }}"@isset($user) @if (in_Array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset>
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

</div>

@endsection