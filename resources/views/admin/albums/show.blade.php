@extends('layouts.admin')

@section('content')
<div class="flex-container">
<div class="columns m-t-10">
    <div class="column">
      <h1 class="title">{{$album->name}}</h1>
    </div>
    <div class="column">
      <a href="{{route('albums.index')}}" class="button is-primary is-pulled-right">Go back</a>
      <a href="{{route('photos.create',$album->id)}}" class="button is-primary is-pulled-right m-r-10">Upload photo to album</a>
    </div>
  </div>
  <hr>
  @if (count($album->photos) > 0)
  <?php
  $colcount = count($album->photos);
 $i = 1;
  ?>
  <div id="photos">
    <div class="columns text-center m-l-100 m-r-100">
      @foreach ($album->photos as $key=>$photo)
          @if ($i==$colcount)
            <div class="column is-one-quarter end">
              <a href="{{route('photos.show',$photo->id)}}">
                  <img width="300" class="thumbnail" src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
              </a>
              <br>
              <h4 class="title">{{$photo->title}}</h4>
              {!!Form::open(['action' => ['PhotosController@update', $photo->id], 'method' => 'POST'])!!}
                <p class="control">
                  {{Form::text('title','',['placeholder' => 'Photo Title'],['class' => 'input'])}}
                </p>
                {{Form::textarea('description','',['placeholder' => 'Photo Description'])}}
                {{Form::submit('submit', ['class' => 'button is-primary'])}}
              {!!Form::close()!!}
              {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete photo',['class' => 'button alert'])}}
              {!!Form::close()!!}
          @else
            <div class="column is-one-quarter">
              <a href="{{route('photos.show',$photo->id)}}">
                <img  width="300" class="thumbnail" src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
              </a>
              <br>
              <h4 class="text-info">{{$photo->title}}</h4>
              {!!Form::open(['action' => ['PhotosController@update', $photo->id], 'method' => 'POST'])!!}
                <p class="control">
                    {{Form::text('title','',['placeholder' => 'Photo Title', 'class' => 'input'])}}
                  </p>
                {{Form::textarea('description','',['placeholder' => 'Photo Description'])}}
                {{Form::submit('submit',['class' => 'button is-primary'])}}
              {!!Form::close()!!}
              {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete photo',['class' => 'button alert'])}}
              {!!Form::close()!!}
          @endif
          @if ($i % 4 == 0)
            </div>
          </div><div class="columns text-center m-l-100 m-r-100">
          @else
            </div>          
          @endif
          <?php $i++;?>
      @endforeach
    </div>
  </div>
  @else
    <p>No Photos to display</p>
     
 @endif
</div>
<div id="app" class="container">
    
    <section>
        <b-modal :active.sync="isCardModalActive" :width="640" scroll="keep">
            <div class="card">
<div class="card-image">
    <figure class="image is-4by3">
      <img src="https://buefy.github.io/static/img/placeholder-1280x960.png" alt="Image">
    </figure>
</div>
<div class="card-content">
    <div class="media">
        <div class="media-left">
            <figure class="image is-48x48">
                <img src="https://buefy.github.io/static/img/placeholder-1280x960.png" alt="Image">
            </figure>
        </div>
        <div class="media-content">
            <p class="title is-4">John Smith</p>
            <p class="subtitle is-6">@johnsmith</p>
        </div>
    </div>

    <div class="content">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Phasellus nec iaculis mauris. <a>@bulmaio</a>.
        <a>#css</a> <a>#responsive</a>
        <br>
        <small>11:09 PM - 1 Jan 2016</small>
    </div>
</div>
            </div>
        </b-modal>
    </section>

</div>
            
@endsection
@section('scripts')
    <script>


var example = {
    data() {
        return {
isImageModalActive: false,
isCardModalActive: false,
        }
    }
}

var app = new Vue(example)

app.$mount('#app')
</script>
@endsection