@extends('layouts.master')
@section('content')
 
<section class="bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <form method="POST" action="{{url('posts/'.$post->id)}}" enctype="multipart/form-data">
               <input type="hidden" name="_method" value="PUT">
              {{csrf_field()}}
                <div class="form-group">
                  <label for="nom">Nom de la formation :</label>
                  <input type="text" class="form-control  @if($errors->get('nom')) is-invalid @endif" id="nom" name="nom" placeholder="saisir le nom de la categorie" value="{{$post->nom}}">
                  @if($errors->get('nom'))
                     @foreach($errors->get('nom') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
               <div class="form-group">
                  <label for="small_description">description :</label>
                  <input type="text" class="form-control  @if($errors->get('small_description')) is-invalid @endif" name="small_description" id="small_description"  placeholder="petite desciption" value="{{$post->small_description}}">
                  @if($errors->get('small_description'))
                     @foreach($errors->get('small_description') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                </div>
          <div class="form-group">
          <textarea rows="5" class="form-control  @if($errors->get('full_description')) is-invalid @endif" name="full_description" id="full_description"  placeholder="desciption">{{$post->full_description}}</textarea>
          @if($errors->get('full_description'))
                     @foreach($errors->get('full_description') as $msg)
                          <div class="invalid-feedback">{{$msg}}</div>
                     @endforeach
                  @endif
                  </div>
                    <div class="form-group">
                  <label for="nom">la catégorie :</label>
                    <select id="product_categorie" class="form-control" name="categorie_id">
                      @foreach($categories as $categorie)
                      <option value="{{$categorie->id}}">{{$categorie->nom}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="nom">la département :</label>
                    <select id="department" class="form-control" name="department_id">
                      @foreach($departments as $department)
                      <option value="{{$department->id}}">{{$department->nom}}</option>
                      @endforeach
                    </select>
                  </div>
                   <div class="form-group">
                  <label for="nom">la filière :</label>
                    <select id="branch" class="form-control" name="branch_id">
                      @foreach($branchs as $branch)
                      <option value="{{$branch->id}}">{{$branch->nom}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                  <label for="nom">le niveau :</label>
                    <select id="level_id" class="form-control" name="level_id">
                      @foreach($levels as $level)
                      <option value="{{$level->id}}">{{$level->nom}}</option>
                      @endforeach
                    </select>
                  <div class="form-group">
                    <label for="photo"></label>
                     <input type="file" class="form-control-file" name="photo" id="photo">
                      </div>
                      <div class="text-center">
                   <input type="submit" class="btn btn-danger btn-block btn-lg" value="Modéfier la formation"></div>
             </form>
           </div>
         </div>
       </div>
</section>
<script type="text/javascript">
  $(document).ready(function () {
    $("#department").change(function () {
        var department = $(this).val();
        @foreach($departments as $department)
           
            $("#branch").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
        }     
        @endforeach
        if (val == "item1") {
            $("#size").html("<option value='test'>item1: test 1</option><option value='test2'>item1: test 2</option>");
        } else if (val == "item2") {
            $("#size").html("<option value='test'>item2: test 1</option><option value='test2'>item2: test 2</option>");
        } else if (val == "item3") {
            $("#size").html("<option value='test'>item3: test 1</option><option value='test2'>item3: test 2</option>");
        } else if (val == "item0") {
            $("#size").html("<option value=''>--select one--</option>");
        }
    });
});
</script>
@endsection