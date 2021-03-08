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
            <h4 class="card-title text-white">Roles</h4>
        </div>
        <div class="">
            <a class="btn btn-success" href="{{ route('role.create') }}">Create Role</a>
        </div>
    </div>
       
      
    </div>


  <div class="card-body">
    
    <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#id</th>
            <th>Role Name</th>
            <th width="">Action</th>
          </tr>
          @foreach ($roles as $role)
        </thead>
        <tbody>
            <tr>
                <th>{{ $role->id }}</th>
                <th>{{ $role->name }}</th>
                <th width="">
                    <a class="btn btn-success" href="{{ route('role.show',$role->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('role.edit',$role->id) }}">Edit</a>
              <button type="button" class="btn btn-danger"
              onclick="event.preventDefault();
                                                     document.getElementById('delete_role_form{{ $role->id }}').submit();">
                                        {{ __('Delete') }}
                                        
                                      </button>
           

           <form id="delete_role_form{{ $role->id }}" action="{{ route('role.destroy',$role->id) }}" method="POST" class="d-none">
               @csrf
               @method('DELETE')
           </form>
                </th>
              </tr>

        </tbody>
        @endforeach
      </table>
      
    </div>
    
    

  </div>
  

</div>

@endsection