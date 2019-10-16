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
            <h2 class="section-heading text-uppercase">{{$post->nom}}</h2>
            <img class="img-fluid" src="{{asset('storage/'.$post->photo)}}" alt="">
            <br/>
            <h3 class=" text-muted">{{$post->small_description}}</h3>
            <h4 class="section-subheading text-muted">{{$post->full_description}}</h4>
          </div>
        </div>
<!-----posts--------------->
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <head>
                <tr>
                  <th>title</th>
                  <th>description</th>
                  <th>Détail</th>
                </tr>
              </head>
              <body>
                    @foreach($subposts as $subpost)
                <tr>
                  <th>{{$subpost->nom}}</th>
                  <th>{{$subpost->small_description}}</th>
                  <th>
                    <a href="{{asset('storage/'.$subpost->file)}}" download class="btn btn-success" >Download </a>
                    <a href="{{asset('storage/'.$subpost->file)}}" target="_blank" class="btn btn-primary">afficher </a>
                  </th>
                </tr>
                @endforeach
              </body>
            </table>
          </div>
      </div>
      <div class="row justify-content-center">
              {{ $subposts->links() }}
         </div>
<!-----end posts--------------->
    </div>
</section>

@endsection