@extends('layouts.app')

@section('content')
@section('stylesheet')
@endsection
<div class=" container">
        <div class="row justify-content ">

            @include('includes.profile_sidbar')

            <div class="col-md-9 container" >
                <div class="card ">
                    <header class="card-header">
                        <p> Nouvelle Tâche </p>

                    </header>


                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="POST"  action="{{ route('tache.store') }}" class="container" >

                        <div class="form-group ">
                            @csrf

                            <div class="form-group" for="projet_id">
                                <label ><strong>Projet </strong></label>
                                <select class="form-control"  name="projet_id"  id="projet_id">
                                    <option value="">select projet</option>
                                    @foreach( $projets as $projet )
                                        <option value="{{$projet->id}}"> {{$projet->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <label ><strong>Catégories du Tâche</strong></label>
                            <button class="btn btn" style="font-size: 15px; color: #0e84b5;border: 1px solid #0e84b5 ">
                                <i class="fa fa-plus" style="font-size:15px"></i><strong> Ajouter Catégories du Tâche </strong> </button>
                        </div>
                        <div class="form-group">
                            <label for="name"><strong>titre</strong></label>
                            <input type="text" class="form-control" id="titre" name="titre" required  >
                        </div>



                        <div class="form-group">
                            <label for="description"><strong> Déscription  du projet </strong></label>
                            <textarea class="form-control" id="textarea" name="description" ></textarea>
                        </div>


                    <div  class="form-group" >

                        <label for="priorite" >
                            <strong> priorité </strong>
                        </label>
                        <div class="form-check" style="color: #fec107; font-size: 20px;">
                            <input class="form-check-input" type="radio" name="priorite"
                                   value="moyenne"  @if (old('priorite')=="moyenne")  checked @endif >
                            <label class="form-check-label" >
                                moyenne
                            </label>
                        </div>
                        <div class="form-check" style="color:#00c292; font-size: 20px;">
                            <input class="form-check-input" type="radio" name="priorite"  value="facile"
                                   @if (old('priorite')=="facile")  checked @endif >
                            <label class="form-check-label" >
                                facile
                            </label>
                        </div>

                    <div class="form-check"style="color: tomato; font-size: 20px;">
                            <input class="form-check-input" type="radio" name="priorite"
                                   value="difficile"  @if (old('priorite') == "difficile") checked @endif >
                            <label class="form-check-label" for="exampleRadios3">
                                difficile
                            </label>
                        </div>

                </div>


                <div class="form-group">
               <h5 class="text-center font-weight-bold">Laravel 6 Multiple Images Upload Using Dropzone</h5>
               <form></form>

                    <form method="post" action="{{route('tache.uploadImages')}}" class="dropzone" id="my-awesome-dropzone" >
                        @csrf

                    </form>

{{-- id="dropzone"--}}




                </div>




                        <div  class="form-group ">
                            <button class="btn btn-primary" type="submit" > save</button>
{{--                            <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('desc')


@endsection
@endsection
{{--
</body>
</html>
--}}
