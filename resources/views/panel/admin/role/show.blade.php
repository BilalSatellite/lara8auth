@extends('panel.master')
@section('tital', 'Role Info')
@section('content')

<div class="">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
</div>


        <div class="">
            <a class="btn btn-success" href="{{ route('role.index') }}"> View Role</a>
        </div>
    </div>
       
      
    </div>


  <div class="card-body">
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $role->name }}
                </div>
            </div>
      
    </div>
    

  </div>
  

</div>

@endsection