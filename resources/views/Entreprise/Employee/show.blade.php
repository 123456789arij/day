@extends('layouts.base')

@section('content')
    {{-- app-page-title--}}
    <div class="app-page-title">
        <div class="page-title-wrapper">
            {{-- page-title-wrapper--}}
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                </div>
                <div> Employée </div>
                {{--    <div class="page-title-subheading">This is an example dashboard created using build-in
                        elements and components
                    </div>--}}
            </div>
            {{--   /page-title-wrapper--}}

            <div class="page-title-actions">
                <div class="d-inline-block dropdown">
                    {{--       <button class="btn-shadow mb-2 mr-2 btn btn-alternate btn-lg">
                                <span class="btn-icon-wrapper pr-2 opacity-7">
                                     <i class="fa pe-7s-add-user " style="font-size: 20px;"></i>
                                 </span>
                               <a href="{{route('Entreprise.Employee.create')}}"
                                  style="color: white;font-size: 15px;"> Ajouter un nouveau employée  </a>&nbsp;&nbsp;
                           </button>--}}
                </div>
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
                    </div><br/>
                @endif
                <br>

                <div class="card-header">
                    Ajouter un nouveau Employée
                </div>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">



                <div class="col-md-9">

                            <div class="card-body">
                                {{--                                container--}}
                                <div class="container">
                                    <div class="row">
                                            <div class="card col-4 " style="width: 20rem;">
                                                <img src="#" alt="image" class="card-img-top">
                                                <div class="card-body">
                                                    <h5 class="card-title"> {{ $employee->name }} </h5>
                                                </div>
                                            </div>

                                            <div class="col-4 container"style="float: right">
                                                <div class="col">Tâches accomplies</div>
                                                <div class="col">Heures enregistrées</div>
                                            </div>
                                            <div class="col-4 container">
                                                <div class="col ">Leaves Taken </div>
                                                <div class="col ">Remaining Leaves</div>
                                            </div>

                                    </div>
                                </div>
{{--                                container--}}
                                <br>

                                <div class="text-center">
                                        <ul class="nav nav-tabs card-header-tabs" id="bologna-list" id="bologna-list" role="tablist">
                                            <li class="nav-item">
                                                <!--&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;-->
                                                <a class="nav-link active" href="#profile" role="tab" aria-controls="" aria-selected="true">profile</a>
                                            </li>
                                            <!--      History -->
                                            <li class="nav-item">
                                                <a class="nav-link"  href="#projet" role="tab" aria-controls="profile" aria-selected="false">Projets</a>
                                            </li>
                                            <!--   Deals -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Tâches</a>
                                            </li>
                                        </ul>

                                    <!-- /header -->
                                    <!--   	body -->
                                    <div class="card-body">

                                        <div class="tab-content container">
                                            <!--   	profile-->
                                            <div class="tab-pane active" id="profile" role="tabpanel">
                                                <table class="table table-bordered ">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Role</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>{{ $employee->name }}</td>
                                                        <td>   {{$employee->email}}</td>
                                                        <td>{{$employee->role}}</td>
                                                    </tr>
                                                    <tr class="col-6">
                                                        <th scope="col">sex </th>
                                                        <th scope="col">Adresse </th>

                                                    </tr>
                                                    <tr class="col-6">
                                                    <th scope="col">Compétence</th>
                                                    <th scope="col">télephone </th>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--   	/profile-->

                                            <!-- projet-->
                                            <div class="tab-pane" id="projet" role="tabpanel" aria-labelledby="history-tab">
                                                <p class="card-text">hello     </p>
                                                <a href="#" class="card-link text-danger">Read more</a>
                                            </div>
                                            <!-- deals -->
                                            <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                                                <p class="card-text">Immerse yourself in the colours, aromas and traditions of Emilia-Romagna with a holiday in Bologna, and discover the city's rich artistic heritage.</p>
                                                <a href="#" class="btn btn-danger btn-sm">Get Deals</a>
                                            </div>
                                            <!-- /deals -->
                                        </div>


                                    {{--                <a class="nav-link active" href="#">Active</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{route('Entreprise.Employee.profile')}}">profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link disabled" href="#">Projets</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link disabled" href="#">Tâches</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Special title treatment</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="#" class="btn btn-primary">Go somewhere</a>
                                        </div>--}}

                            </div>
                        </div>
                    </div>































            </div>
        </div>
    </div>


@endsection
@section('jsBlock')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>

        $('#bologna-list a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });
    </script>
    @endsection
