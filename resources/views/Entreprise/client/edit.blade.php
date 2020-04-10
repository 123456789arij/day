@extends('layouts.base')

@section('content')
    {{-- app-page-title--}}
    <div class="app-page-title">
        <div class="page-title-wrapper">
            {{-- page-title-wrapper--}}
            <div class="page-title-heading container">
                <div class="page-title-icon">
                    <i class="pe-7s-user icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    METTRE À JOUR LES INFORMATIONS du CLIENT
                </div>
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

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">

                {{--        @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif--}}


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
                    Ajouter un nouveau Client
                </div>

                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">DÉTAILS DU CLIENT</h5>
                                <hr>
                                <form action="{{ route('Entreprise.client.update', $client->id ) }}" method="POST">
                                    {{--  partie email +adresse--}}
                                    <div class="form-row">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name"> NOM </label>
                                                <input type="text" class="form-control"  name="name" value="{{$client->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control"  name="email" value="{{$client->email}}"
                                                       class="@error('email', 'login') is-invalid @enderror">
                                                @error('email', 'login')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" name="password">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row">
                                        @csrf
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="Mobile"> Télephone </label>
                                                <input type="text" class="form-control" id="Mobile" name="Mobile" value="{{$client->Mobile}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="adresse"> Adresse</label>
                                                <input type="text" class="form-control" id="adresse" name="adresse" value="{{$client->adresse}}">
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title"> AUTRES DÉTAILS DU CLIENT</h5>
                                    <hr>
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="Linkedin"> Linkedin</label>
                                                <input type="text" class="form-control" value="{{$client->Linkedin}}" name="Linkedin">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="Facebook"> Facebook</label>
                                                <input type="text" class="form-control" value="{{$client->Facebook}}" name="Facebook">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="Skype"> Skype</label>
                                                <input type="text" class="form-control" value="{{$client->Skype}}" name="Skype">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-block text-center card-footer">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                            <a href="{{route('Entreprise.client.index')}}">
                                                <i class="pe-7s-trash btn-icon-wrapper"></i></a></button>
                                        <button class="btn-wide btn btn-success" type="submit">Save</button>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
