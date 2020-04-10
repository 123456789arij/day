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
                    <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                </div>
                <div> Employée</div>
                {{--    <div class="page-title-subheading">This is an example dashboard created using build-in
                        elements and components
                    </div>--}}
            </div>
        </div>
    </div>
    {{--                /app-page-title--}}
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
        </div>
    @endif

    <div class="card-header">Ajouter un nouveau Employée</div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="col-md-9">
                    <div class="card-body">
                        {{--container--}}
                        <div class="container">
                            <div class="row">
                                <div class="card col-4 " style="width: 20rem;">
                                    <img src="#" alt="image" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $employee->name }} </h5>
                                    </div>
                                </div>
                                <div class="col-4 container" style="float: right">
                                    <div class="col">Tâches accomplies</div>
                                    <div class="col">Heures enregistrées</div>
                                </div>
                                <div class="col-4 container">
                                    <div class="col ">Leaves Taken</div>
                                    <div class="col ">Remaining Leaves</div>
                                </div>
                            </div>
                        </div>
                        {{-- /container--}}
                        <br>
                        <!------ carde tab ---------->
                        <div class="row">
                            <div class="col-12">
                            <div class="card-header card-header-tab-animation">
                                <ul class="nav nav-justified">
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-0" class="active nav-link">Profile</a>
                                    </li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-1" class="nav-link">Projet</a>
                                    </li>
                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-2" class="nav-link"> Tache</a>
                                    </li>
{{--                                    <li class="nav-item"><a data-toggle="tab" href="#tab-eg115-3" class="nav-link"> facture</a>--}}
{{--                                    </li>--}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- profile--}}
                                    <div class="tab-pane active" id="tab-eg115-0" role="tabpanel">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Employee ID</th>
                                                    <th scope="col">Employee Name</th>
                                                    <th scope="col">Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>     {{ $employee->id }}</td>
                                                    <td>        {{ $employee->name }} </td>
                                                    <td>{{ $employee->email }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                {{--       	date_inscription

                                                   id_department
                                                 --}}
                                                <th scope="col">sex</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">skills</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>    {{ $employee->sex}}</td>
                                                <td>       {{ $employee->adresse }} </td>
                                                <td>{{ $employee->skills}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col"> Date d'inscription</th>
{{--                                        --}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>    {{ $employee->date_inscription}}</td>
{{--                                                <td>       {{ $employee->department->name}} </td>--}}
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                        {{-- /profile--}}

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

                                                    </tbody>
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
                        </div>
                        {{--                /carde tab--}}




                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('jsBlock')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
@endsection
