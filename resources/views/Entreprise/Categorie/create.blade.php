@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('includes.profile_sidbar')

            <div class="col-md-9">
                <div class="card">
                    <header class="card-header">
                        <p> Ajouter une nouvelle Categorie </p>
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

                    <form method="POST"  action="{{ route('categorie.store') }}" >

                        <div class="form-group">
                            @csrf
                            <label for="name"><strong>nom du Categorie</strong></label>
                            <input type="text" class="form-control" id="name" name="name" required  >
                        </div>
                        <div  class="form-group ">
                            <button class="btn btn-primary" type="submit" > save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
