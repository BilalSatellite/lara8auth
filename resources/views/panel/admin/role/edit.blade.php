@extends('panel.master')
@section('tital', 'Edit Role')
@section('content')

<div class="">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="">
    <a class="btn btn-success" href="{{ route('role.index') }}"> Role list</a>
</div>
</div>

</div>
<div class="card-body">
    <form method="POST" action="{{ route('role.update', $roles->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}@isset($roles){{ $roles->name }}@endisset" required autocomplete="name"
                    autofocus>
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