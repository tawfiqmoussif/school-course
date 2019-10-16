@extends('layouts.master')
@section('content')
<section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{url('levels')}}">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="nom">nom :</label>
                   <input type="text" class="form-control  @if($errors->get('nom')) is-invalid @endif" id="nom" name="nom" value="{{old('nom')}}" placeholder="saisir le nom du niveau">
                  @if($errors->get('nom'))
                     @foreach($errors->get('nom') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
                <input type="hidden" name="branch_id" value="{{ $_GET['id']}}">
                <input type="submit" class="btn btn-primary" value="Ajouter le niveau">
             </form>
           </div>
         </div>
       </div>
</section>
@endsection