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
                  <td>
                    <a href="{{route('users.show', $user->id)}}" class="button is-pulled-left is-outlined m-r-10">View</a>
                    <a href="{{route('users.edit', $user->id)}}" class="button is-pulled-left is-outlined m-r-10">Edit</a>
                    <form id="delete" action="{{route('users.destroy',$user->id)}}" method="post">
                      {{method_field('DELETE')}}
                      {{csrf_field()}}
                    </form>
                    <button class="button is-danger is-pulled-left" @click="isComponentModalActive = true">Delete</button>
                    <b-modal :active.sync="isComponentModalActive" has-modal-card>
                      <modal-form></modal-form>
                    </b-modal>
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
{{--
@section('scripts')
  <script>


      const ModalForm = {
          template: `
<div class="modal-card" style="width: auto">
    <header class="modal-card-head">
        <p class="modal-card-title">Are you sure you want to delete this item?</p>
    </header>
    <footer class="modal-card-foot">
        <button class="button" type="button" @click="$parent.close()">Close</button>
        <button id="submitDelete" class="button is-danger" onclick="document.getElementById('delete').submit()">Delete</button>
    </footer>
</div>
        `
      }

      const example = {
          components: {
              ModalForm
          },
          data() {
              return {
                  isComponentModalActive: false,
                  isDeleteSubmit: false
              }
          }
      }


      const app = new Vue(example)

      app.$mount('#app
  </script>
@endsection
--}}
