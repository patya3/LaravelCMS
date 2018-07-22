{{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="{{route('home')}}" role="tab" aria-controls="home" aria-selected="true">
          <img width="120" src="{{asset('images/devmarketer-logo.png')}}" alt="DevMarketer logo">
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#" role="tab" aria-controls="profile" aria-selected="false">Learn</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#" role="tab" aria-controls="contact" aria-selected="false">Discuss</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="share-tab" data-toggle="tab" href="#" role="tab" aria-controls="share" aria-selected="false">Share</a>
      </li>
    @if (Auth::guest())
      <ul class="nav justify-content-end">
        <li class="nav-item">
          <a class="nav-item is-tab" href="{{route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-item is-tab" href="{{route('register')}}">Join the Community</a>
        </li>
      </ul>
      @else
          <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hey {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a href="#" class="dropdown-item">
                    <span class="icon">
                      <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                    </span>Profile
                  </a>
                  <a href="#" class="dropdown-item">
                      <span class="icon">
                        <i class="fa fa-fw fa-bell m-r-5"></i>
                      </span>Notifications
                    </a>
                    <a href="{{route('admin.index')}}" class="dropdown-item">
                        <span class="icon">
                          <i class="fa fa-fw fa-cog m-r-5"></i>
                        </span>Settings
                      </a>
                      <span class="seperator"></span>
                      <a href="{{route('logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <span class="icon">
                      <i class="fa fa-fw fa-sign-out m-r-5"></i>
                    </span>
                    Logout
                  </a>
                  @include('_includes.forms.logout')
              </div>
            </div>        
  @endif
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    <div class="tab-pane fade" id="share" role="tabpanel" aria-labelledby="share-tab">...</div>
</div> --}}


<nav class="nav has-shadow" >
  <div class="container">
    <div class="nav-left">
      <a class="nav-item is-paddingless" href="{{route('home')}}">
        <img src="{{asset('images/devmarketer-logo.png')}}" alt="DevMarketer logo">
      </a>
      <a class="nav-item is-tab is-hidden-mobile m-l-10">Learn</a>
      <a class="nav-item is-tab is-hidden-mobile">Discuss</a>
      <a class="nav-item is-tab is-hidden-mobile">Share</a>
    </div>
    <span class="nav-toggle">
      <span></span>
      <span></span>
      <span></span>
    </span>
    <div class="nav-right nav-menu" style="overflow: visible">
      <a class="nav-item is-tab is-hidden-tablet is-active">Learn</a>
      <a class="nav-item is-tab is-hidden-tablet">Discuss</a>
      <a class="nav-item is-tab is-hidden-tablet">Share</a>
      @if (Auth::guest())
        <a class="nav-item is-tab" href="{{route('login')}}">Login</a>
    <a class="nav-item is-tab" href="{{route('register')}}">Join the Community</a>
      @else
        <div class="dropdown">
          <button class="nav-item is-tab dropdown-toggle">
            <figure class="image is-16x16" style="margin-right: 8px;">
              <img src="http://bulma.io/images/jgthms.png">
            </figure>

          </button>
          <button class="dropdown is-aligned-right nav-item is-tab" >
            Hey {{ Auth::user()->name }}
            <ul class="dropdown-menu" style="overflow: visible;">
              <li><a href="#">
                    <span class="icon">
                      <i class="fa fa-fw fa-user-circle-o m-r-5"></i>
                    </span>Profile
                  </a>
              </li>
              <li><a href="#">
                    <span class="icon">
                      <i class="fa fa-fw fa-bell m-r-5"></i>
                    </span>Notifications
                  </a>
              </li>
              <li><a href="{{route('admin.index')}}">
                    <span class="icon">
                      <i class="fa fa-fw fa-cog m-r-5"></i>
                    </span>Settings
                  </a>
              </li>
              <li class="seperator"></li>
              <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                    <span class="icon">
                      <i class="fa fa-fw fa-sign-out m-r-5"></i>
                    </span>
                    Logout
                  </a>
                  @include('_includes.forms.logout')
              </li>
            </ul>
          </button>
        </div>
      @endif
    </div>
  </div>
</nav>