@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard
                        <a style="float: right"  class="btn btn-primary"  href="{{ route('superAdmin.Entreprise.create') }}"> Ajouter une nouvelle  Entreprise </a>&nbsp;</div>

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
                                    <th scope="col">nom </th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">created_at</th>
                                    <th colspan="2">ACTIONS </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users  as $user)
                                    {{--          <img src="/img/{{$produit->client->photo}}" alt="im" style="width: 50px;height: 50px;"class="img-fluid mx-auto">--}}
                                    <tr>
                                        <td>{{ $user->id }} </td>
                                        <td>{{ $user->name }} </td>
                                        <td>{{ $user->email }} </td>
                                        <td>{{ $user->created_at }}</td>
                                     <td>
                                              <a href="{{ route('superAdmin.Entreprise.edit', $user->id) }}" class="btn btn-warning" >Modifier </a>
                                          </td>
                                          <td>
                                              <form action="{{ route('superAdmin.Entreprise.destroy',$user->id) }}" method="post">.
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
                </div>
            </div>
        </div>
    </div>
@endsection
