@extends('layouts.base')
@section('cssBlock')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
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

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card-header">
                    Ajouter un nouveau Employée
                </div>

                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                {{--                                    <h5 class="card-title">Grid Rows</h5>--}}
                                <form method="POST" action="{{ route('Entreprise.Employee.store') }}" class="container" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--  partie email +adresse--}}
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name"> NOM </label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       class="@error('email', 'login') is-invalid @enderror" required>
                                                @error('email', 'login')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="password">Password</label>
                                                <input type="password" data-toggle="password" class="form-control"
                                                       id="password"
                                                       name="password" required>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  /partie email +adresse--}}

                                    <div class="form-row">
                                        {{--  date d'inscription--}}
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="date_inscription"> date d'inscription </label>
                                                <input type="date" class="form-control" id="date_inscription"
                                                       name="date_inscription">
                                            </div>
                                        </div>
                                        {{-- date d'inscription--}}
                                        {{--   sex--}}
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="sex"> sex </label>
                                                <select class="mb-2 form-control form-control" name="sex"
                                                        id="projet_id">
                                                    <option value="femme" @if (old('sex')=="femme")  checked @endif >
                                                        femme
                                                    </option>
                                                    <option value="homme" @if (old('sex')=="homme")  checked @endif>
                                                        homme
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--/sex--}}
                                    </div>


                                    <div class="position-relative form-group">
                                        <div class="col-12">
                                            <label for="adresse">Adresse</label>
                                            <textarea name="adresse" id="exampleText" class="form-control">
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="position-relative form-group">
                                        <div class="col-12">
                                            <label for="skills">Compétence</label>
                                            <input id="basic" type="text" name="skills" class="form-control">
                                        </div>
                                    </div>
                                    {{--  row role et departement--}}
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label for="role">
                                                <strong> role</strong>
                                            </label>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" id="1" type="radio" name="role"
                                                       value="1" @if (old('role')=="employee")  checked @endif >
                                                <label class="custom-control-label" for="1">
                                                    Employée
                                                </label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input class="custom-control-input" type="radio" name="role" id="2"
                                                       value="2" @if (old('role')=="admin")  checked @endif >
                                                <label class="custom-control-label" for="2">
                                                    Admin
                                                </label>
                                            </div>
                                        </div>
                                        {{--    Département--}}
                                        <div class="col-md-6">
                                            <div class="position-relative form-group" for="id_department">
                                                <label>Département</label>
                                                <select class="mb-2 form-control-lg form-control"
                                                        name="id_department">
                                                    <option value="">Choose....</option>
                                                    @foreach( $departments as $department )
                                                        <option
                                                            value="{{$department->id}}"> {{$department->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{--/departement--}}
                                    </div>
                                    {{--  row role et departement--}}
                                    {{-- image --}}
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="image">File Select</label>
                                            <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image" id="image"  value="{{ old('image') }}" name="image">
                                        </div>
                                    </div>
                                    {{--/image --}}
                                    <br><br><br>
                                    <div class="d-block text-center card-footer">
                                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                            <i class="pe-7s-trash btn-icon-wrapper"> </i></button>
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
@section('jsBlock')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>
    {{--    targify skills --}}
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <script>
        var input = document.querySelector('input[id=basic]');
        // init Tagify script on the above inputs
        new Tagify(input) </script>
@endsection

