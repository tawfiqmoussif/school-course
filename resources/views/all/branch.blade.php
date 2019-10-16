@extends('layouts.master')
@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
      </div>
    </header>
<!--headeEnd--> 
<section id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">{{$branch->nom}}</h2>
            <img class="img-fluid" src="{{asset('storage/'.$branch->photo)}}" alt="">
            <br/>
            <h3 class=" text-muted">{{$branch->small_description}}</h3>
            <h4 class="section-subheading text-muted">{{$branch->full_description}}</h4>
          </div>
        </div>
<!-----posts--------------->
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <head>
                <tr>
                  <th>title</th>
                  <th>Détail</th>
                </tr>
              </head>
              <body>
                    @foreach($levels as $level)
                <tr>
                  <th>{{$level->nom}}</th>
                  <th>
                    <a href="{{url('level/'.$level->id)}}" class="btn btn-primary">afficher </a>
                  </th>
                </tr>
                @endforeach
              </body>
            </table>
          </div>
      </div>
      <div class="row justify-content-center">
              {{ $levels->links() }}
         </div>
<!-----end posts--------------->
    </div>
</section>

@endsection