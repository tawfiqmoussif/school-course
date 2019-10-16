@extends('layouts.master')
@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
      </div>
    </header>
  <!--headeEnd-->  
<section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
         
          <div class="col-lg-12 text-center">
            <h2 class="section-heading">Les formations de filière : {{$level->branch->nom}}<br> niveau : {{$level->nom}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
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
              <p><small>l'éditeur : {{$post->user->name}}</small></p>
              <a href="{{url('post/'.$post->id)}}" class="btn btn-primary">détail</a> 
            </div>
          </div>
        @endforeach
        </div>
        <div class="center">
  {{ $posts->links() }}
          
        </div>
      </div>

    </section>


    <!--model-->
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
                     <a href="{{url('post/'.$post->id)}}" class="btn btn-primary">détail</a> 
                   </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endsection