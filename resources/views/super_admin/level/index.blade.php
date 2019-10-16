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
  <section >
 <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            @include('share.flash')
          </div>
          <div class="col-md-12 text-center">
            <h2 class="section-heading text-uppercase">{{$branch->nom}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
       <div class="alert clearfix">
         <form method="GET" action="{{url('levels/create')}}">
                    <input type="hidden" name="id" value="{{$branch->id}}">
                    <button type="submit" class="btn btn-primary btn-block">Ajouter un niveau</button>
          </form> 
       </div>
         </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table">
              <head>
                <tr>
                  <th>title</th>
                  <th>Détail</th>
                  <th>actions</th>
                </tr>
              </head>
              <body>
                    @foreach($levels as $level)
                    <script> 
    $(function(){
      $("#includedContent").load("{{asset('post')}}"); 
    });
    </script> 
                <tr>

                  <th>{{$level->nom}}</th>
                  <th>
                   
                    <a href="#"  class="btn btn-primary">afficher </a>
                  <th>
                    <form method="POST" action="{{url('levels/'.$level->id)}}">
                             {{csrf_field()}}
                             {{method_field('DELETE')}}

                              <!----*******************update hna ghi 3la 7sab chkal*******************--------------->
                             <a class="btn btn-warning" href="{{url('levels/'.$level->id.'/edit')}}">Editer</a>
                             <!----******************* delete *******************--------------->
                             <input type="hidden" name="branch_id" value="{{$branch->id}}">
                             <button class="btn btn-danger" onclick="return confirm('Vous étes sur?')" type="submit">Supprimer</button>
                            </form>
                  </th>
                </tr>
                <div id="includedContent"></div>
                @endforeach
              </body>
            </table>
          </div>
      </div>
  </div>
  </section> 
@endsection