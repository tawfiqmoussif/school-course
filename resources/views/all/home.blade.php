@extends('layouts.master')
@section('content')
<!-- Services -->
 <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Studio!</div>
          <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
           @if(Auth::check())
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
          @else
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{url('login') }}">s'identifier</a>
          @endif
        </div>
      </div>
    </header>
  <!--headeEnd-->

  <section class="features-icons text-center" id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <a href="{{ url('department') }}">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
            </a>

              <h3>les départements</h3>
              <p> les départements de l'école</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <a href="{{ url('branch') }}">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
            </a>
              <h3>les filières</h3>les filières de l'ecole</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
               <a href="{{ url('categorie') }}">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
            </a>
              <h3>les catégories</h3>
              <p class="lead mb-0">les catégories des cours dans l'école</p>
            </div>
          </div>
        </div>
      </div>
    </section>

  <!---categories------>
      <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">les catégories</h2>
          </div>
        </div>
        <div class="row">
        @foreach($categories as $categorie)
        
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModalCategorie{{$categorie->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{asset('storage/'.$categorie->photo)}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$categorie->nom}}</h4>
              <p class="text-muted">{{$categorie->small_description}}</p>
               <a href="{{url('categorie/'.$categorie->id)}}" class="btn btn-success"> détail</span></a>
            </div>
          </div>
        
        @endforeach
        </div>
         <div class="row justify-content-center  ">
          <a href="{{url('categorie')}}" class="btn btn-success">plus de détail</a>
         </div>
      </div>
    </section>
<!---end categories ----------->


<!-----posts--------------->
   <section  id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">les formations</h2>
          </div>
        </div>
        <div class="row">
        @foreach($posts as $post)
        
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$post->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{asset('storage/'.$post->photo)}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$post->nom}}</h4>
              <p class="text-muted">{{$post->small_description}}</p>
              <a href="{{url('post/'.$post->id)}}" class="btn btn-success"> détail</span></a>
            </div>
          </div>
        
        @endforeach
        </div>
        <div class="row justify-content-center  ">
          <a href="{{url('post')}}" class="btn btn-success">plus de détail</a>
         </div>
      </div>
    </section>
<!-----end posts--------------->


    <!--model posts-->
@foreach($posts as $post)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$post->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$post->nom}}</h2>
                  <p class="item-intro text-muted">{{$post->small_description}}</p>
                  <img class="img-fluid d-block mx-auto" src="{{asset('storage/'.$post->photo)}}" alt="">
                  <p>{{$post->full_description}}</p>
                  
                   <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>Fermer
                    </button>
                     <a href="{{url('post/'.$post->id)}}" class="btn btn-success"> détail</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach


<!--model categories-->
@foreach($categories as $categorie)
    <div class="portfolio-modal modal fade" id="portfolioModalCategorie{{$categorie->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$categorie->nom}}</h2>
                  <p class="item-intro text-muted">{{$categorie->small_description}}</p>
                  <img class="img-fluid d-block mx-auto" src="{{asset('storage/'.$categorie->photo)}}" alt="">
                  <p>{{$categorie->full_description}}</p>
                  
                  <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>Fermer
                    </button>
                     <a href="{{url('categorie/'.$categorie->id)}}" class="btn btn-success"> détail</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach

@endsection
