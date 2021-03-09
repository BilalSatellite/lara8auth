@extends('panel.master')
@section('tital', 'View Users')
    

@section('content')

<div class="">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
</div>


      <div class="">
        <a class="btn btn-success" href="{{ route('alluser.create') }}"> Create New User</a>
      </div>
    </div>

  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th>#id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Roles</th>
            <th width="">Action</th>
          </tr>
          @foreach ($users as $key => $user)
        </thead>
        <tbody>
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
              @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
              <label class="badge badge-success">{{ $v }}</label>
              @endforeach
              @endif
            </td>
            <td>
              <a class="btn btn-success" href="{{ route('alluser.show',$user->id) }}">Show</a>
              <a class="btn btn-primary" href="{{ route('alluser.edit',$user->id) }}">Edit</a>
              <button type="button" class="btn btn-danger"
              onclick="event.preventDefault();
                                                     document.getElementById('delete_user_form{{ $user->id }}').submit();">
                                        {{ __('Delete') }}
                                        
                                      </button>
           

           <form id="delete_user_form{{ $user->id }}" action="{{ route('alluser.destroy',$user->id) }}" method="POST" class="d-none">
               @csrf
               @method('DELETE')
           </form>
            </td>
          </tr>

        </tbody>
        @endforeach
      </table>
      
    </div>
    

  </div>
  <div class="card-footer float-right">
    <div class="float-right">
      {{ $users->links() }}
    </div>
  </div>

</div>

@endsection