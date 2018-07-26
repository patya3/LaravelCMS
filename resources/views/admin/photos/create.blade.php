@extends('layouts.admin')

@section('content')
  <h3>Upload photo</h3>

  {!!Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}
    {{Form::text('title','',['placeholder' => 'Photo Title'])}}
    {{Form::textarea('description','',['placeholder' => 'Photo Description'])}}
    {{Form::hidden('album_id',$album_id)}}
    {{Form::file('photo')}}
    {{Form::submit('submit')}}
  {!!Form::close()!!}

  <div id="app" class="container">
    <section>
      <button class="button is-primary is-medium"
              @click="isComponentModalActive = true">
        Launch component modal
      </button>

      <b-modal :active.sync="isComponentModalActive" has-modal-card>
        <modal-form v-bind="formProps"></modal-form>
      </b-modal>
    </section>

  </div>
@endsection
@section('scripts')
  <script>

  </script>
@endsection