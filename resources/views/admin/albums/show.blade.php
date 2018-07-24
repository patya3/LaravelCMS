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
      <button class="button is-primary is-pulled-right m-r-10" onclick="saveChanges()">Save changes</button>
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
                  <img width="400" class="thumbnail" src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
              </a>
              <br>
              <h4 class="title">{{$photo->title}}</h4>
                <form action="{{route('photos.update',$photo->id)}}" method="post" class="update">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="field">
                        <p class="control">
                            <input type="text" name="title" class="input" placeholder="Photo Title">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <textarea name="description" placeholder="Photo Description" cols="30" rows="10" class="input"></textarea>
                        </p>
                    </div>
                    <button class="button is-primary">Edit Photo</button>
                </form>
                <form id="delete" action="{{route('photos.destroy', $photo->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                </form>
                <button class="button is-primary"@click="isComponentModalActive = true">Delete Photo</button>
                <b-modal :active.sync="isComponentModalActive" has-modal-card>
                    <modal-form></modal-form>
                </b-modal>
          @else
            <div class="column is-one-quarter">
              <a href="{{route('photos.show',$photo->id)}}">
                <img  width="400" class="thumbnail" src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
              </a>
              <br>
              <h4 class="title">{{$photo->title}}</h4>
                <form action="{{route('photos.update',$photo->id)}}" method="post" class="update">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="field">
                        <p class="control">
                            <input type="text" name="title" class="input" placeholder="Photo Title">
                        </p>
                    </div>
                    <div class="field">
                        <p class="control">
                            <textarea name="description" placeholder="Photo Description" cols="30" rows="10" class="input"></textarea>
                        </p>
                    </div>
                    <button class="button is-primary">Edit Photo</button>
                </form>
                <form id="delete" action="{{route('photos.destroy', $photo->id)}}" method="post">
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                </form>
                <button class="button is-primary"@click="isComponentModalActive = true">Delete Photo</button>
                <b-modal :active.sync="isComponentModalActive" has-modal-card>
                    <modal-form></modal-form>
                </b-modal>
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
@endsection{{--
@section('scripts')
    <script>
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
        function saveChanges() {
            var forms = new Array();
            $('.update').each(function () {
                forms.push($(this));
            });
            for(var i = 0; i < forms.length; i++) {
                forms[i].submit().delay( 800 );
            }
            /*$('button.is-hidden').each(function () {
               $(this).trigger('click');
            });*/
        }
    </script>
@endsection--}}