@extends('layouts.admin')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Manage Users</h1>
      </div>
      <div class="column">
        <a href="{{route('users.create')}}" class="button is-primary"><i class="fa fa-user-add m-r-10"></i>Create New User</a>
      </div>
    </div>
      <hr>
      <div class="card">
        <div class="card-content">
          <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Date Created</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr>
                  <th>{{$user->id}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->created_at->toFormattedDateString()}}</td>
                  <td><a href="{{route('users.edit', $user->id)}}" class="button is-outlined">Edit</a></td>
                  <td>
                    <form id="deleteUser" action="{{route('users.destroy',$user->id)}}" method="post">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                    </form>
                    <button class="button is-danger">Delete</button>
                  </td>
                </tr>    
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
    {{$users->links()}}
  </div>
@endsection

@section('scripts')
<script>
  $('.button.is-danger').click(function() {
    if(confirm('Are you sure, you want to delete this user?')) {
      $('#deleteUser').submit();
    }
  });
</script>
@endsection