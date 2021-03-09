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
         @include('panel.admin.include.form',['create'=>true])
        </form>

    </div>

</div>

@endsection