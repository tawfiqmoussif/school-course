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
            <h2 class="section-heading text-uppercase">les départements</h2>
          </div>
        </div>
        <div class="row">
        @foreach($departments as $department)
        
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModalCategorie{{$department->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid" src="{{asset('storage/'.$department->photo)}}" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$department->nom}}</h4>
              <p class="text-muted">{{$department->small_description}}</p>
              <a href="{{url('department/'.$department->id)}}" class="btn btn-success"> détail</span></a>
            </div>
          </div>
        
        @endforeach
        </div>
         <div class="row justify-content-center  ">
        {{ $departments->links() }}
         </div>
      </div>
    </section>



<!--model categories-->
@foreach($departments as $department)
    <div class="portfolio-modal modal fade" id="portfolioModalCategorie{{$department->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">{{$department->nom}}</h2>
                  <p class="item-intro text-muted">{{$department->small_description}}</p>
                  <img class="img-fluid d-block mx-auto" src="{{asset('storage/'.$department->photo)}}" alt="">
                  <p>{{$department->full_description}}</p>
                  
                  <button class="btn btn-danger" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>Fermer
                    </button>
                     <a href="{{url('department/'.$department->id)}}" class="btn btn-success"> détail</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endsection
