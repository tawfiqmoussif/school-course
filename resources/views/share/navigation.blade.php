<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01"><strong>
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('hh', 'E-learning') }}</a></strong>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      @if(Auth::check())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         {{ Auth::user()->name }} 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          
          @if(Auth::user()->hasRole('super_admin'))
          <a class="dropdown-item" href="{{ url('admincategories') }}">categories</a>
          <a class="dropdown-item" href="{{ url('departments') }}">départements</a>
          <a class="dropdown-item" href="{{ url('branchs') }}">filières</a>
          <a class="dropdown-item" href="{{ url('posts') }}">Les cours</a>
          <a class="dropdown-item" href="{{ url('registrations') }}">Gestion des utilisateurs</a>

          @endif
          @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
          <a class="dropdown-item" href="{{ url('posts') }}">Mes cours</a>
          @endif
          @if(Auth::user()->hasRole('admin'))
          <a class="dropdown-item" href="{{ url('registerfromadmins') }}">Ajouter un utilisateur</a>
          @endif
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Déconnecter
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                      {{ csrf_field() }}
                                                    </form></a>
        </div>
      </li>
          @if(Auth::user()->hasRole('super_admin'))
            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i>
              Notifications <span class="badge badge-danger" id="count-notification">{{auth()->user()->unreadNotifications->count()}}</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(auth()->user()->unreadNotifications->count())
                    @foreach(auth()->user()->unreadNotifications as $notification)
                    <form method="POST" action="{{url('markAsRead')}}">
                       {{csrf_field()}}
            
                    <input type="submit" name="" class="dropdown-item" value="{{$notification->data['user']['email']}}"> 
                  </form>
                    @endforeach
                @else
                 <a class="dropdown-item" href="#">Non notifications</a>
                 @endif
              </div>
            </li>
          @endif
      @else
       <li class="nav-item active">
        <a class="nav-link" href="{{url('login') }}">Connexion <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="{{url('register') }}">S'isnscrire <span class="sr-only">(current)</span></a>
      </li>
      @endif
      <li class="nav-item active">
        <a class="nav-link" href="{{url('department') }}">départements <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('branch') }}">filières <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{url('categorie') }}">catégories <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search">
       <span class="input-group-btn">
                     <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span></button>
                   </span>
    </form>
    
  </div>
</nav>

