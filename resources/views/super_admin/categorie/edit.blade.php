@extends('layouts.master')
@section('content')
<section class="bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{url('admincategories/'.$categorie->id)}}" enctype="multipart/form-data">
               <input type="hidden" name="_method" value="PUT">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="nom">Nom de la catégorie :</label>
                  <input type="text" class="form-control  @if($errors->get('nom')) is-invalid @endif" id="nom" name="nom" placeholder="saisir le nom de la categorie" value="{{$categorie->nom}}">
                  @if($errors->get('nom'))
                     @foreach($errors->get('nom') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
               <div class="form-group">
                  <label for="small_description">description :</label>
                  <input type="text" class="form-control  @if($errors->get('small_description')) is-invalid @endif" name="small_description" id="small_description"  placeholder="petite desciption" value="{{$categorie->small_description}}">
                  @if($errors->get('small_description'))
                     @foreach($errors->get('small_description') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
          <div class="form-group">
          <textarea rows="5" class="form-control  @if($errors->get('full_description')) is-invalid @endif" name="full_description" id="full_description"  placeholder="desciption">{{$categorie->full_description}}</textarea>
          @if($errors->get('full_description'))
                     @foreach($errors->get('full_description') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                  </div>
                  <div class="form-group">
                    <label for="photo"></label>
                     <input type="file" class="form-control-file" name="photo" id="photo" accept="image/gif, image/jpeg, image/png, image/jpg">
                      </div>
                      <div class="text-center">
                   <input type="submit" class="btn btn-danger btn-block btn-lg" value="Modéfier la catégorie"></div>
             </form>
           </div>
         </div>
       </div>
</section>

@endsection