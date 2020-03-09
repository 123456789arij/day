@extends('layouts.app')

@section('stylesheet')

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

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('includes.profile_sidbar')

            <div class="col-md-9">
                <div class="card">
                    <header class="card-header">
                        <p> Ajouter un nouvel PROJET</p>

                    </header>


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{--     @if ($errors->any())
                             <div class="alert alert-danger">
                                 <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="POST"  action="{{ route('projet.store') }}" >

                        <div class="form-group">
                            @csrf
                            <label for="name"><strong>nom du projet </strong></label>
                            <input type="text" class="form-control" id="name" name="name" required  >
                        </div>


                        <div class="form-group">
                            <label ><strong>Catégories du projet </strong></label>
                            <button class="btn btn" style="font-size: 15px; color: #0e84b5;border: 1px solid #0e84b5 "><i class="fa fa-plus" style="font-size:15px"></i><strong> Ajouter Catégories du projet </strong> </button>
                        </div>

                        <div class="form-group">
                            <select class="form-control" name="sex"  id="sex"  required>
                                <option value="">Choose....</option>
                                <option value="homme" @if (old('sex') == 'homme') selected="selected" @endif>Laravel</option>
                                <option value="femme" @if (old('sex') == 'femme') selected="selected" @endif>Symfony4 </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="description"><strong> Déscription  du projet </strong></label>
                            <textarea class="form-control" id="textarea" name="description" ></textarea>
                        </div>

                        <div class="form-group">
                            <label for="password"><strong>
                                    Devise</strong></label>
                            <select class="form-control" name="sex"  id="sex"  required>
                                <option value="">Choose....</option>
                                <option value="homme" @if (old('sex') == 'homme') selected="selected" @endif>Laravel</option>
                                <option value="femme" @if (old('sex') == 'femme') selected="selected" @endif>Symfony4 </option>
                            </select>
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
@endsection
