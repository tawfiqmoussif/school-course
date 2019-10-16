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
            <h2 class="section-heading text-uppercase">{{$post->nom}}</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
			 <div class="alert clearfix">
        @can('update',$post)
			 	 <form method="GET" action="{{url('subposts/create')}}">
                    <input type="hidden" name="id" value="{{$post->id}}">
                    <button type="submit" class="btn btn-primary btn-block">Nouveau Chapitre</button>
          </form> 
          @endcan
       </div>
    	   </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
          	<table class="table">
          		<head>
          			<tr>
          				<th>title</th>
          				<th>description</th>
                  <th>Détail</th>
          				<th>actions</th>
          			</tr>
          		</head>
          		<body>
                    @foreach($subposts as $subpost)
                    <script> 
    $(function(){
      $("#includedContent").load("{{asset('post')}}"); 
    });
    </script> 
          			<tr>

          				<th>{{$subpost->nom}}</th>
          				<th>{{$subpost->small_description}}</th>
                  <th>
                    <a href="{{asset('storage/'.$subpost->file)}}" download class="btn btn-success" >Download </a>
                    <a href="{{asset('storage/'.$subpost->file)}}" target="_blank" class="btn btn-primary">afficher </a>
          				<th>
          					<form method="POST" action="{{url('subposts/'.$subpost->id)}}">
                             {{csrf_field()}}
                             {{method_field('DELETE')}}

                              <!----*******************update hna ghi 3la 7sab chkal*******************--------------->
                              @can('update',$post)
                             <a class="btn btn-warning" href="{{url('subposts/'.$subpost->id.'/edit')}}">Editer</a>
                             @endcan
                             <!----******************* delete *******************--------------->
                             <input type="hidden" name="post_id" value="{{$post->id}}">
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