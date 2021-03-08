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
            <h4 class="card-title text-white">User Profile</h4>
        </div>
        <div class="">
            <a class="btn btn-success" href="{{ route('alluser.index') }}"> User list</a>
        </div>
    </div>
       
      
    </div>


  <div class="card-body">
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
       
      
    </div>
    

  </div>
  

</div>

@endsection