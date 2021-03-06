@extends('layouts.base')
@section('cssBlock')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css"/>
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
                <div>Projet</div>
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

                    METTRE À JOUR LES DÉTAILS DU PROJET
                </div>

                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                {{--                                    <h5 class="card-title">Grid Rows</h5>--}}
                                <form method="POST" action="{{ route('projet.update',$projet->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    {{--  partie email +adresse--}}
                                    <div class="form-row">
                                        <div class="col-12 ">
                                            <div class="position-relative form-group">
                                                <label for="name"> nom du projet </label>
                                                <input type="text" class="form-control" value="{{$projet->name}}"
                                                       name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <label><strong>Catégories du projet </strong></label>
                                            {{--      <button type="button" class="btn btn-primary" data-toggle="modal"
                                                          data-target="#exampleModalCenter">
                                                      <a href="{{route('Entreprise.categorie.index')}}" style="color:white;">
                                                          Ajouter Catégories du projet</a>
                                                  </button> --}}
                                            {{--  <button style="font-size: 15px; color: white;border: 1px solid"
                                                    type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <i class="fa fa-plus" style="font-size:15px"></i>

                                                --}}{{--                                                      <a href="{{route('projet.create')}}"> </a>--}}{{--
                                            </button>--}}
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            {{--<div class="position-relative form-group"for="Categories_Id">
                                                <label >categories </label>
                                                <select class="mb-2 form-control-lg form-control" name="Categories_Id">
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{$category->id}}"> {{$category->name_categorie}} </option>
                                                    @endforeach
                                                </select>
                                            </div>--}}
                                        </div>
                                    </div>
                                    {{--Categorie du projet--}}
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="position-relative form-group" for="Categories_Id">
                                                <label>Categorie du projet</label>
                                                <select class="mb-2 form-control-lg form-control" name="Categories_Id"
                                                        id="Categories_Id">
                                                    @foreach($categories as $category )
                                                        <option
                                                            value="{{$category->id}}" > {{$category->name_categorie}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{--/Categorie du projet--}}
                                    {{--client--}}
                                    <div class="form-row">
                                        <div class="col-12">
                                            <div class="position-relative form-group" for="id_client">
                                                <label>Sélectionnez un client</label>
                                                <select class="mb-2 form-control-lg form-control" name="id_client">
                                                    <option value="">Choose....</option>
                                                    @foreach($clients as $client)
                                                        <option
                                                            value="{{$client->id}}"> {{$client->name}} </option>

{{--

                                                        @foreach($projet as $id => $client)
                                                            @if(old('id_client', $projet->id_client) == $id )
                                                                <option value="{{ $id }}" selected>{{ $name }}</option>
                                                            @else
                                                                <option value="{{ $id }}">{{ $name }}</option>
                                                            @endif
--}}






                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{--/client--}}
                                    <div class="form-row">
                                        <div class="col-4">
                                            <div class="position-relative form-group">
                                                <label for="start_date"> Date de début </label>
                                                <input type="date" class="form-control" id="start_date"
                                                       value="{{$projet->start_date}}"
                                                       name="start_date">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="position-relative form-group">
                                                <label for="Deadline"> Date limite</label>
                                                <input type="date" class="form-control" id="Deadline"
                                                       name="Deadline" value="{{$projet->Deadline}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="Project_Status"> L'état du projet </label>
                                                <select class="mb-2 form-control form-control" name="Project_Status">





                                                    <option value="0"
                                                            @if (old('Project_Status')=="pas encore commencé")  checked @endif >
                                                        pas encore commencé
                                                    </option>
                                                    <option value="1"
                                                            @if (old('Project_Status')=="en attente")  checked @endif>
                                                        en attente
                                                    </option>
                                                    <option value="2"
                                                            @if (old('Project_Status')=="en cour")  checked @endif>
                                                        en cour
                                                    </option>
                                                    <option value="3"
                                                            @if (old('Project_Status')=="annulé")  checked @endif>
                                                        annulé
                                                    </option>
                                                    <option value="4"
                                                            @if (old('Project_Status')=="fini")  checked @endif>
                                                        fini
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-12">

                                            <label for="">Statut d'achèvement du projet</label>
                                            <input type="text" class="js-range-slider" name="my_range"
                                                   value="{{$projet->progress_bar}}"/>
                                        </div>
                                    </div>

                                    <div class="divider"></div>
                                    <br>
                                    <div class="col">
                                        <label for="description"><strong> Déscription du projet </strong></label>
                                        <textarea id="textarea" name="description"
                                                  value="{{$projet->description}}"></textarea>
                                    </div>

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

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            branding: false,
            plugins: "fullscreen",
            menubar: false,
            setup: function (editor) {
                editor.on('change', function () {
                    tinymce.triggerSave();
                });
            },
            //  toolbar: "fullscreen",
        });

        //      tinymce.activeEditor.execCommand('mceFullScreen');

    </script>
    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <script>
        $(".js-range-slider").ionRangeSlider({
            skin: "modern",
            grid: true,
            prefix: "%",
        });
    </script>
@endsection
