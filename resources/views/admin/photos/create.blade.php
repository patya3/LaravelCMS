@extends('layouts.admin')

@section('content')
  <div class="flex-container">
    <div class="columns m-t-10">
      <div class="column">
        <h1 class="title">Upload Photo</h1>
      </div>
      <div class="column">
        <a href="{{route('albums.show', $album_id)}}" class="is-pulled-right button is-primary">Go back</a>
      </div>
    </div>
    <hr class="m-t-0">

  {!!Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('title','',['placeholder' => 'Photo Title'])}}
    {{Form::textarea('description','',['placeholder' => 'Photo Description'])}}
    {{Form::hidden('album_id',$album_id)}}
    {{Form::file('photo')}}
    {{Form::submit('submit')}}
  {!!Form::close()!!}


@endsection