@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorie du projet

                    <div class="card-body">
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



                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">id </th>
                                <th scope="col">nom du Categorie  </th>
                                <th colspan="2">ACTIONS </th>
                            </tr>
                            </thead>
                            <tbody>

                         @foreach($categories  as $categorie)
                                <tr>
                                    <td>{{ $categorie->id }} </td>
                                    <td>{{ $categorie->name }} </td>
                                    <td>
                                        <form action="{{ route('categorie.destroy',$categorie->id) }}" method="post">.
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                         <form method="POST"  action="{{ route('categorie.store') }}" >

                             <div class="form-group">
                                 @csrf
                                 <label for="name">
                                     <strong>nom du Categorie</strong></label>
                                 <input type="text" class="form-control" id="name" name="name">
                             </div>

                             <div  class="form-group ">
                                 <button class="btn btn-primary" type="submit" > save</button>
                             </div>
                         </form>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
