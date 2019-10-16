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
            <h2 class="section-heading text-uppercase">Les Filières</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            
			       <div class="alert clearfix">
                  <a href="{{url('branchs/create')}}" class="alert-link">
                    <button type="button" class="btn btn-primary btn-block">Nouvelle Filière</button>
                  </a>
             </div>
    			</div>
        </div>
        <div class="row">
        @foreach($branchs as $branch)
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$branch->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{asset('storage/'.$branch->photo)}}" alt="">
            </a>
            <div class="portfolio-caption">
              
              <h4>{{$branch->nom}}</h4>
              <p class="text-muted">{{$branch->small_description}}</p>
              
             <!----*******************form for delete *******************--------------->
              <form method="POST" action="{{url('branchs/'.$branch->id)}}">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <!----*******************update hna ghi 3la 7sab chkal*******************--------------->
               <a class="btn btn-primary" href="{{url('branchs/'.$branch->id.'/edit')}}"><span class="fas fa-pen"></span></a>
              <!----******************* delete *******************--------------->
              <button class="btn btn-danger" onclick="return confirm('Vous étes sur?')" type="submit"><span class="fas fa-trash"></span></a>
              </form>

               
            </div>
          </div>
        @endforeach
        </div>
        <div class="center">
  {{ $branchs->links() }}
          
        </div>
      </div>

    </section>


    <!--model-->
@foreach($branchs as $branch)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$branch->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">{{$branch->nom}}</h2>
                  <p class="item-intro text-muted">{{$branch->small_description}}</p>
                  <img class="img-fluid d-block mx-auto" src="{{asset('storage/'.$branch->photo)}}" alt="">
                  <p>{{$branch->full_description}}</p>
                  <form method="GET" action="{{url('levels')}}">
                   <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>Fermer
                    </button>
                     <a class="btn btn-primary" href="{{url('branchs/'.$branch->id.'/edit')}}"><span class="fas fa-pen"> editer</span></a>
                     <input type="hidden" name="branch_id" value="{{$branch->id}}">
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