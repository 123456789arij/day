@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @include('includes.profile_sidbar')

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><i class="fas fa-user-alt"></i>Projets


{{--                        <a style="float: right"   href="#"> Ajouter  Catégorie  du projet  </a>&nbsp;&nbsp;--}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


         <a style="float: right"  class="btn btn-primary"  href="{{ route('projet.create') }}">  Ajouter un nouveau   projet </a>
                            &nbsp;&nbsp;



                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th scope="col">id </th>
                                <th scope="col">nom du projet </th>
                                <th scope="col">Membres du projet</th>
                                <th scope="col">Dedline</th>
                                <th scope="col">Client </th>
                                <th colspan="2">completition </th>
                                <th colspan="2">Action  </th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--                         @foreach($employees  as $employee)
                                                                    <img src="/img/{{$produit->client->photo}}" alt="im" style="width: 50px;height: 50px;"class="img-fluid mx-auto">
                                                            <tr>
                                                                <td>{{ $employee->id }} </td>
                                                                <td>{{ $employee->nom }} </td>
                                                                <td>{{ $employee->email }} </td>
                                                                <td>{{ $employee->sex }}</td>
                                                                <td>{{ $employee->created_at }}</td>

                                                                <td>
                                                                    <a href="#" class="btn btn-warning" >Modifier </a>
                                                                </td>
                                                                <td>
                                                                    <form action="#" method="post">.
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger">Supprimer</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach--}}
                            </tbody>
                        </table>







                        {{--

                                                <footer class="card-footer">
                                                    {{  $employees->links() }}
                                                </footer>

                                                @section('css')
                                                    <style>
                                                        .card-footer {
                                                            justify-content: center;
                                                            align-items: center;
                                                            padding: 0.4em;
                                                        }
                                                    </style>
                                                @endsection
                        --}}




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

