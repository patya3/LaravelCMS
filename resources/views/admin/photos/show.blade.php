@extends('layouts.admin')

@section('content')
    <h3>{{$photo->title}}</h3>
    <p>{{$photo->description}}</p>
    <a href="{{route('albums.show',$photo->album_id)}}">Back to Gallery</a>
    <hr>
    <img src="../../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
    <br><br>
    {!!Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete photo',['class' => 'button alert'])}}
    {!!Form::close()!!}
    <hr>
    <small>Size: {{$photo->size}}</small>
    <div id="app" class="container"> 
            <section>
                <button class="button is-primary is-medium"
                    @click="isCardModalActive = true">
                    Launch card modal (keep scroll)
                </button>
        
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
                isCardModalActive: true
            }
        }
    }


    var app = new Vue(example)

    app.$mount('#app')
    $('#app').on('.zoom-out-leave-active', function () {
        console.log('kecske');
    });
</script>
@endsection