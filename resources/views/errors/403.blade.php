@extends('layouts.master')
@section('content')
<!-- Header -->
    <header class="mastheadt">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Our Studio!</div>
          <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
        </div>
      </div>
    </header>
  <!--headeEnd-->  
<div class="container">
  <dir class="row">
    <div class="col-md-12 text-center">
      <h2>cette page est non autoriser</h2>
      <a class="btn btn-danger" href="{{url('posts')}}">Retour</a>

    </div>
   </dir>
  </div>

@endsection