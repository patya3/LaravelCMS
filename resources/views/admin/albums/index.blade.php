@extends('layouts.admin')
@section('content')
@include('_includes.nav.messages')
<div class="flex-container">
    <div class="columns m-t-10">
        <div class="column">
          <h1 class="title">Albums</h1>
        </div>
        <div class="column">
          <a href="{{route('admin.index')}}" class="button is-primary is-pulled-right">Go back</a>
          <a href="{{route('albums.create')}}" class="button is-primary is-pulled-right m-r-10">Create new album</a>
        </div>
      </div>
      <hr>
 @if (count($albums) > 0)
  <?php
  $colcount = count($albums);
  $i = 1
  ?>
  <div id="albums">
      <div class="columns text-center m-l-100 m-r-100">
      @foreach ($albums as $album)
          @if ($i==$colcount)
            <div class="column is-one-quarter end">
              <a href="{{route('albums.show',$album->id)}}">
                <img width="300" class="thumbnail" src="../storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
              </a>
              <br>
              <h4 class="title">{{$album->name}}</h4>
          @else
            <div class="column is-one-quarter">
              <a href="{{route('albums.show',$album->id)}}">
                <img width="300" class="thumbnail" src="../storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}">
              </a>
              <br>
              <h4 class="title">{{$album->name}}</h4>
          @endif
          @if ($i % 4 == 0)
            </div>
          </div>
          <div class="columns text-center m-l-100 m-r-100">
          @else
            </div>              
          @endif
          <?php $i++;?>
      @endforeach
    </div>
  </div>
  @else
    <p>No Albums to display</p>
     
 @endif
</div>
@endsection