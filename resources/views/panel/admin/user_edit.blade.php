@extends('panel.master')

@section('content')
<h5>Welcome, {{ auth()->user()->name }}</h5>
<div class="">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>

<div class="card ">
    <div class="card-header bg-primary">
        <div class="d-flex justify-content-between">
            <div class="">
                <h4 class="card-title text-white">Edit User</h4>
            </div>
            <div class="">
                <a class="btn btn-success" href="{{ route('alluser.index') }}"> User list</a>
            </div>
        </div>

    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('alluser.update',$user->id) }}">
            @method('PATCH')
         @include('panel.admin.include.form')
        </form>

    </div>

</div>

@endsection