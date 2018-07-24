<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
  @include('_includes.nav.main')
  @include('_includes.nav.admin')
  <div class="management-area" id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
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

      app.$mount('#app')
  </script>
</body>
</html>
