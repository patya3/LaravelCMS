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
  </div>
@endsection