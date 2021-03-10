@extends('panel.master')
@section('tital', 'Roles')
@section('content')

<div class="">
  @if (session('status'))
  <div class="alert alert-success" role="alert">
    {{ session('status') }}
  </div>
  @endif
</div>
<div class="">
  <a class="btn btn-success" href="{{ route('role.create') }}">Permission Role</a>
</div>
</div>
</div>



{{-- Permission index --}}
<div class="card-body">

  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>#id</th>
        <th>Permission Name</th>
        <th>Roles</th>
        <th width="">Action</th>
      </tr>
      @foreach ($permissions as $permission)
    </thead>
    <tbody>
      <tr>
        <th>{{ $permission->id }}</th>
        <th>{{ $permission->name }}</th>
        <td>
          @if(!empty($permission->getRoleNames()))
          @foreach($permission->getRoleNames() as $v)
          <label class="badge badge-success">{{ $v }}</label>
          @endforeach
          @endif
        </td>
        <th width="">
          <a class="btn btn-success" href="{{ route('permission.show',$permission->id) }}">Show</a>
          <a class="btn btn-primary" href="{{ route('permission.edit',$permission->id) }}">Edit</a>
          <button type="button" class="btn btn-danger"
            onclick="event.preventDefault();
               document.getElementById(
                 'delete_permission_form{{ $permission->id }}').submit();">
            {{ __('Delete') }}
          </button>
          <form id="delete_permission_form{{ $permission->id }}" action="{{ route('permission.destroy',$permission->id) }}" method="POST"
            class="d-none">
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