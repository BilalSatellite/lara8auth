@extends('panel.master')
@section('tital', 'Edit Permission')
@section('content')
<div class="">
</div>

<div class="">

    <a class="btn btn-success" href="{{ route('permission.index') }}"> View Permissions</a>

</div>
</div>

</div>
<div class="card-body">

    <form method="POST" action="{{ route('permission.update', $permissions->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Permission Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}@isset($permissions){{ $permissions->name }}@endisset" required
                    autocomplete="name" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Roles :') }}</label>
            <div class="col-md-6">
                @foreach ($roles as $role)
                    <div class="form-check">
                        <label class="form-check-label" for="{{ $role->name }}">
                            <input type="checkbox" class="form-check-input" name="roles[]" id="{{ $role->name }}"
                                value="{{ $role->id }}" @isset($permissions) @if (in_Array($role->id, $permissions->roles->pluck('id')->toArray())) checked @endif @endisset>
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
