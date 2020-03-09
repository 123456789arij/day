@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorie du projet
                        <a style="float: right"  class="btn btn-primary"  href="{{ route('superAdmin.Entreprise.create') }}"> Ajouter une nouvelle  Categorie </a>&nbsp;</div>

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
                           {{-- @foreach($users  as $user)
                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->name }} </td>
                                    <td>
                                        <form action="{{ route('superAdmin.Entreprise.destroy',$user->id) }}" method="post">.
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach--}}
                            </tbody>
                        </table>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
