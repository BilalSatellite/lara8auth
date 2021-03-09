@extends('panel.master')
@section('tital', 'Edit User')

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
        <form method="POST" action="{{ route('alluser.update',$user->id) }}">
            @method('PATCH')
         @include('panel.admin.users.include.form')
        </form>

    </div>

</div>

@endsection