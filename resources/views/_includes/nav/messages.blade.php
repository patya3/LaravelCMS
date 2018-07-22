@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="is-danger">
          {{$error}}
        </div>
    @endforeach
@endif

@if (session('succes'))
    <div class="is-success">
      {{session('succes')}}
    </div>
@endif
@if (session('error'))
    <div class="is-danger">
      {{session('error')}}
    </div>
@endif