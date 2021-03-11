@extends('panel.master')
@if(Route::is('role.show') )
@section('tital', 'Role Info')
@else
@section('tital', 'Permissions Info')
@endif
@section('content')

<div class="">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
</div>
        <div class="">
            <a class="btn btn-success" href="{{ route('role.index') }}"> @if(Route::is('role.show') ) View Role @else View Permissions @endif</a>
        </div>
    </div>
    </div>
  <div class="card-body">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    @if(Route::is('role.show') )
                    {{ $role->name }}
                    @else
                    {{ $permission->name }}
                    @endif
                </div>
                
            </div>
    </div>
  </div>
  

</div>

@endsection