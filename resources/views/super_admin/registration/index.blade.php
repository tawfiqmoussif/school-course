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
            <h2 class="section-heading text-uppercase">les utilisateurs</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
			 <div class="alert clearfix">
                    <a href="{{url('registrations/create')}}" class="btn btn-primary btn-block">Ajouter un utilisateur</a>
             </div>
    	   </div>
        </div>
        <div class="row">
        	<div class="col-md-12 col-sm-12">
          	<table class="table">
          		<head>
          			<tr>
          				<th>nom</th>
          				<th>email</th>
                  <th>Role</th>
          				<th>actions</th>
          			</tr>
          		</head>
          		<body>
                    @foreach($users as $user)
                    @if($user->hasRole('super_admin'))
                    @else
          			<tr>
          				<th>{{$user->name}}</th>
          				<th>{{$user->email}}</th>
                  <th>
                    <?php if($user->hasRole('simple_user')){ ?>
                    étudiant
                    <?php } else if($user->hasRole('editor')){ ?>
                    enseignant
                    <?php } else if($user->hasRole('admin')){ ?>
                    admin
                  <?php } else if($user->hasRole('not_active')){ ?>
                    <div class="alert-danger"> not active</div>
                    <?php } ?>

                  </th>
          				<th>
          					<form method="POST" action="{{url('registrations/'.$user->id)}}">
                             {{csrf_field()}}
                             {{method_field('DELETE')}}
                             <!----******************* delete *******************--------------->
                              <a class="btn btn-primary" href="{{url('registrations/'.$user->id.'/edit')}}">éditer&nbsp;<span class="fas fa-pen"></span></a>
                          <button class="btn btn-danger" onclick="return confirm('Vous étes sur?')" type="submit">supprimer&nbsp;<span class="fas fa-trash"></span>
                          </button>
                    </form>
          				</th>
          			</tr>
                @endif
          			@endforeach
          		</body>
          	</table>
            <div class="row">
           <div class="col-md-6 col-lg-6 col-sm-6 ">
             </div>
          <div class="col-md-6 col-lg-6 col-sm-6 ">
            {{ $users->links() }}
             </div>
           </div>
      </div>
          </div>
      </div>
  </div>
  </section> 
@endsection