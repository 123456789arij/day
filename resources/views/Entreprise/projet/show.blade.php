@extends('layouts.base')
@section('cssBlock')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
@endsection
@section('content')
    {{-- app-page-title--}}
    <div class="app-page-title">
        <div class="page-title-wrapper">
            {{-- page-title-wrapper--}}
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> projet #
                    {{--    <div class="page-title-subheading">This is an example dashboard created using build-in
                            elements and components
                        </div>--}}
                </div>
            </div>
            {{--   /page-title-wrapper--}}

            <div class="page-title-actions">
                <div class="d-inline-block dropdown text-center">
                    {{--       <button class="btn-shadow mb-2 mr-2 btn btn-alternate btn-lg">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                     <i class="fa pe-7s-add-user " style="font-size: 20px;"></i>
                           </button>--}}
                </div>
            </div>
        </div>
    </div>
    {{--                /app-page-title--}}

    <div class="row">


    </div>
    <div class="row">
        <div class="col-md-12">
            <!------ carde tab ---------->
            <div class="mb-3 card">
                <div class="card-header card-header-tab-animation">
                    <ul class="nav nav-justified">
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="active nav-link">Projet</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link">Membre</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link"> Tache</a>
                        </li>
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link"> facture</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                    {{--projet--}}
                        <div class="tab-pane active" id="tab-eg115-0" role="tabpanel">
                            <h4>Détaille du projet :</h4>
    {{$projet->description}}
                                <br>
                            {{--   client détailles--}}
                            <div class="col-md-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Client</div>
                                    <div class="card-body"><h5 class="card-title">client détailles</h5>
                                        With supporting text below as a natural lead-in to additional content.
                                    </div>
                                </div>
                            </div>
                            {{-- / client détailles--}}
                        </div>
                        {{--projet--}}
                        <div class="tab-pane" id="tab-eg115-1" role="tabpanel">
                            <h4>Membre du projet</h4>
                            <div class="row">
                                <div class="col-6">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                            <th scope="col">role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                  {{--      @foreach( $employes as $employee)
                                    <tr>
                                            <th scope="row">{{$employee->name}}</th>
                                            <td></td>
                                            <td class="text-center">
                                                <form action="{{ route('Entreprise.Employee.destroy',$employee->id) }}" method="post">.
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                                        <i class="pe-7s-trash btn-icon-wrapper" style="font-size: 20px;"> </i></button>

                                                </form>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>--}}
                                    </table>
                                </div>
                                <div class="col-6">
                                    <h2>Ajouter les Membre du projets </h2>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-eg115-2" role="tabpanel">
                            <button>Ajouter une Nouvelle tache</button>
                        </div>
                    </div>
                </div>
            </div>
            {{--                /carde tab--}}

        </div>
    </div>
@endsection
@section('jsBlock')


@endsection
