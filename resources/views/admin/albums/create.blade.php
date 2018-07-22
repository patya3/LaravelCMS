@extends('layouts.admin')

@section('content')
@include('_includes.nav.messages')
          <h1 class="title">Create New Album</h1>
 
      {!!Form::open(['action' => 'AlbumsController@store','method' => 'POST','enctype' => 'multipart/form-data', ])!!}
      	{{Form::text('name','',['placeholder' => 'Album Name'])}}
      	{{Form::textarea('description','',['placeholder' => 'Album Description'])}}
      	{{Form::file('cover_image')}}
      	{{Form::submit('submit')}}
      {!!Form::close()!!}

@endsection