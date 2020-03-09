@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard
                        <a style="float: right"  class="btn btn-primary"  href="{{ route('superAdmin.create') }}"> Ajouter un nouveau Package </a>&nbsp;</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


{{--



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
                                --}}
{{--          <img src="/img/{{$produit->client->photo}}" alt="im" style="width: 50px;height: 50px;"class="img-fluid mx-auto">--}}{{--

                                <tr>
                                    <td>{{ $user->id }} </td>
                                    <td>{{ $user->name }} </td>
                                    <td>{{ $user->email }} </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('superAdmin.edit', $user->id) }}" class="btn btn-warning" >Modifier </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

--}}



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
