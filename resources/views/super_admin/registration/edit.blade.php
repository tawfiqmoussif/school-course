@extends('layouts.master')

@section('content')

  <section class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            @include('share.flash')
          </div>
    </div>
            <div class="row justify-content-center  ">
                <div class="col-md-6 col-lg-4 col-sm-8  rounded border shadow p-3 mb-5 bg-white " id="col-Login" >
                        <p class="text-center"><strong>{{$user->name}}</strong></p>
                        <p class="text-center"><strong>{{$user->email}}</strong></p>

                            <form method="POST" action="{{url('registrations/'.$user->id)}}">
                                 <input type="hidden" name="_method" value="PUT">
                                {{ csrf_field() }}
                               <input type="hidden" name="id" value="{{$user->id}}">
                                 <div class="form-group">
                                   <select id="genre" class="form-control" name="genre">
                                    <option {{$user->hasRole('not_active') ? 'selected' : ''}} value="not_active">not active</option>
                                     <option {{$user->hasRole('simple_user') ? 'selected' : ''}} value="simple_user">étudiant</option>
                                     <option {{$user->hasRole('editor') ? 'selected' : ''}}  value="editor">enseignant</option>
                                     <option {{$user->hasRole('admin') ? 'selected' : ''}} value="admin">admin</option>
                                   </select>
                                 </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">éditer le role</button>
                                </div>
                            </form>
                        </div>
                </div>
            </section>
@endsection
