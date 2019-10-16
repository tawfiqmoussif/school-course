@extends('layouts.master')
@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
        <div class="intro-text">
        </div>
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
            <h2 class="section-heading text-uppercase">Départements</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
			       <div class="alert clearfix">
                  <a href="{{url('departments/create')}}" class="alert-link">
                    <button type="button" class="btn btn-primary btn-block">Nouvelle Département</button>
                  </a>
             </div>
    			</div>
        </div>
        
        <div class="row">
        @foreach($departments as $department)
        
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal{{$department->id}}">
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

             <!----*******************form for delete *******************--------------->
              <form method="POST" action="{{url('departments/'.$department->id)}}">
              {{csrf_field()}}
              {{method_field('DELETE')}}
              <!----*******************update hna ghi 3la 7sab chkal*******************--------------->
               <a class="btn btn-primary" href="{{url('departments/'.$department->id.'/edit')}}"><span class="fas fa-pen"><a ></a></span></a>

              <!----******************* delete *******************--------------->
              <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit"><span class="fas fa-trash"></span></a>
              </form>
               
            </div>
          </div>
        
        @endforeach
        </div>
        <div class="row">
          <div class="col-md-12 ">
            <nav aria-label="...">
              <ul class="pagination">
              </ul>
            </nav></div>
            
          </div>
        </div>
            <div class="row justify-content-center  ">
       
            {{ $departments->links() }}
            
      </div>
    </section>


    <!--model-->
@foreach($departments as $department)
    <div class="portfolio-modal modal fade" id="portfolioModal{{$department->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                     <a class="btn btn-primary" href="{{url('departments/'.$department->id.'/edit')}}"><span class="fas fa-pen"> editer</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach
@endsection