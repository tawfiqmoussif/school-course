@extends('layouts.master')

@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
      </div>
    </header>
  <!--headeEnd-->  
<section class="container">
            <div class="row justify-content-center  ">

                <div class="col-md-5 col-lg-4 col-sm-6 rounded border shadow p-3 mb-5 bg-white " id="col-Login" >
                            <p class="text-center"><strong>Login </strong></p>
                        
                            <form  method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group" id="errorLogin" >
                                </div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label >E-mail</label>
                                    <input id="email" type="email" name="email" class="form-control" placeholder="E-mail" required autofocus>  
                                     @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                     @endif  
                                </div>

                               <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password"  >Mot de passe</label>
                                    <input type="password" class="form-control"  id="password" name="password"  placeholder="Mot de passe" required>
                                     @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Connexion</button>
                                    <br/>
                                    <a class="btn btn-link" href="{{url('register') }}">
                                    Vous n'avez pas un compte?
                                </a>                              
                                </div>
                            </form>
                        </div>
                </div>
            </section>
@endsection
