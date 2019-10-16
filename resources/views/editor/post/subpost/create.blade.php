@extends('layouts.master')
@section('content')
<section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{url('subposts')}}" enctype="multipart/form-data">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="nom">nom de la formation :</label>
                   <input type="text" class="form-control  @if($errors->get('nom')) is-invalid @endif" id="nom" name="nom" value="{{old('nom')}}" placeholder="saisir le nom de la categorie">
                  @if($errors->get('nom'))
                     @foreach($errors->get('nom') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
               <div class="form-group">
                  <label for="small_description">description :</label>
                  <input type="text" class="form-control @if($errors->get('small_description')) is-invalid @endif" name="small_description" value="{{old('small_description')}}" id="small_description"  placeholder="petite desciption">
                  @if($errors->get('small_description'))
                     @foreach($errors->get('small_description') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
                 <div class="form-group">
                    <label for="file"></label>
                     <input type="file" class="form-control-file" name="file" id="file">
                  </div>
                <input type="hidden" name="post_id" value="{{ $_GET['id']}}">
                <input type="submit" class="btn btn-primary" value="Ajouter le chapitre">
             </form>
           </div>
         </div>
       </div>
</section>
@endsection