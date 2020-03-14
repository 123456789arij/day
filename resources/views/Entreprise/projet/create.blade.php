@extends('layouts.app')
    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('includes.profile_sidbar')
            <div class="col-md-9">
                <div class="card">
                    <header class="card-header">
                        <p> Ajouter un nouvel PROJET</p>

                    </header>
  {{-- msg --}}
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif
{{-- form d'ajout project--}}
                    <form method="POST"  action="{{ route('projet.afficher') }}" >
                        <div class="form-group">
                            @csrf
                            <label for="name"><strong>nom du projet </strong></label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label ><strong>Catégories du projet  </strong></label>
                            <button style="font-size: 15px; color: white;border: 1px solid" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                <i class="fa fa-plus" style="font-size:15px"></i>
                                Ajouter Catégories du projet
                                {{--                                <a href="{{route('categorie.index')}}"> </a>--}}
                            </button>
                        </div>
                        <div class="form-group" for="Categories_Id">
                            <select class="form-control" name="Categories_Id"  id="Categories_Id">
                                {{--                                <option value="">Choose....</option>--}}
                       @foreach( $categories as $category )
                                    <option value="{{$category->id}}"> {{$category->name_categorie}} </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="description"><strong> Déscription  du projet </strong></label>
                            <textarea class="form-control" id="textarea" name="description" ></textarea>
                        </div>

                        <div  class="form-group ">
                            <button class="btn btn-primary" type="submit" > save</button>
                            {{--                            <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>--}}
                        </div>
                    </form>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Catégories du projet </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">nom du Categorie  </th>
                                                <th colspan="2">ACTIONS </th>
                                            </tr>
                                            </thead>
                                            <tbody>

                               @foreach($categories  as $categorie)
                                        <tr>
                                                    <td>{{ $categorie->id }} </td>
                                                    <td>{{ $categorie->name_categorie }} </td>
                                      <td>
                                                        <form action="{{ route('projet.destroy',$categorie->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">Supprimer</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        @endforeach

                                            </tbody>
                                        </table>
                                    </div>
{{--   store categories   --}}

                                    <div class="modal-body">
                                        <form method="POST"  action="{{ route('projet.store') }}" >
                                            <div class="form-group">
                                                @csrf
                                                <label>nom du Categorie  </label>
                                                <input type="text" class="form-control" id="name_categorie" name="name_categorie">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button"   type="submit" class="btn btn-primary">Save changes</button>
                                            </div>

                                        </form>
                                    </div>
                        {{--   /store categories   --}}

                                </div>
                            </div>
                        </div>



                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector:'textarea',
        plugins: 'link code',
        plugins: "fullscreen",
        menubar:false,
        //  toolbar: "fullscreen",
    });

    //      tinymce.activeEditor.execCommand('mceFullScreen');

</script>

</body>
</html>
