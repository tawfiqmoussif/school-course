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
          <div class="col-md-12 text-center">
            @include('share.flash')
          </div>
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">@if(Auth::user()->hasRole('super_admin')) Les 
            @else Mes @endif formations</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            
			       <div class="alert clearfix">
                  <a href="{{url('posts/create')}}" class="alert-link">
                    <button type="button" class="btn btn-primary btn-block">Nouvelle formation</button>
                  </a>
             </div>
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
              @if(Auth::user()->hasRole('super_admin'))
              <p><small>l'éditeur : {{$post->user->name}}</small></p>
              @endif
             <!----*******************form for delete *******************--------------->
              <form method="POST" action="{{url('posts/'.$post->id)}}">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <!----*******************update hna ghi 3la 7sab chkal*******************--------------->
                @can('update',$post)
               <a class="btn btn-primary" href="{{url('posts/'.$post->id.'/edit')}}"><span class="fas fa-pen"></span></a>
               @endcan
              <!----******************* delete *******************--------------->
              <button class="btn btn-danger" onclick="return confirm('Vous étes sur?')" type="submit"><span class="fas fa-trash"></span></a>
              </form>

               
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
                  <form method="GET" action="{{url('subposts')}}">
                   <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>Fermer
                    </button>
                     @can('update',$post)
                     <a class="btn btn-primary" href="{{url('posts/'.$post->id.'/edit')}}"><span class="fas fa-pen"> editer</span></a>
                     @endcan
                     <input type="hidden" name="post_id" value="{{$post->id}}">
                     <button type="submit" class="btn btn-success"> détail</span></button>
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