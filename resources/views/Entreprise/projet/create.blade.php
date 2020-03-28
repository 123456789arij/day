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
                <div> PROJET </div>
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
                    Ajouter un nouveau PROJET
                </div>

                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                {{--                                    <h5 class="card-title">Grid Rows</h5>--}}
                                <form method="POST"  action="{{ route('projet.afficher') }}" >
                                    {{--  partie email +adresse--}}
                                    <div class="form-row">
                                        @csrf
                                            <div class="col-12 ">
                                                <div class="position-relative form-group">
                                                    <label for="name"> nom du projet </label>
                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                </div>
                                            </div>
                                        </div>
                             {{--           <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" class="@error('email', 'login') is-invalid @enderror" required>
                                                @error('email', 'login')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>--}}
                                    <div class="form-row">
                                        <div class="col">
                                        <label ><strong>Catégories du projet  </strong></label>
                                        <button style="font-size: 15px; color: white;border: 1px solid" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            <i class="fa fa-plus" style="font-size:15px"></i>
                                            Ajouter Catégories du projet
{{--                                                      <a href="{{route('projet.create')}}"> </a>--}}
                                        </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group" for="Categories_Id">
                                                <select class="mb-2 form-control-lg form-control" name="Categories_Id"  id="Categories_Id">
                                                    {{--                                <option value="">Choose....</option>--}}
                                                    @foreach( $categories as $category )
                                                        <option value="{{$category->id}}"> {{$category->name_categorie}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="divider"></div>

                                    <div class="col">
                                            <label for="description"><strong> Déscription  du projet </strong></label>
                                            <textarea  id="textarea"  name="description"></textarea>
                                    </div>
                                    {{--   / partie sity state --}}
                                    {{--   <div class="position-relative form-check">
                                           <input name="check" id="exampleCheck" type="checkbox" class="form-check-input">
                                           <label for="exampleCheck" class="form-check-label">Check me out</label>
                                       </div>
                                       <button class="mt-2 btn btn-primary">Sign in</button>--}}

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
    {{--   store categories   --}}
    {{--   <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>--}}

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST"  action="{{ route('projet.store') }}" >
                        <div class="form-group">
                            @csrf
                            <label>nom du Categorie  </label>
                            <input type="text" class="form-control" id="name_categorie" name="name_categorie">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button"   type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>



            </div></div></div>
    {{--   /store categories   --}}
@endsection
@section('jsBlock')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link code',
            branding: false,
            plugins: "fullscreen",
            menubar:false,
            //  toolbar: "fullscreen",
        });

        //      tinymce.activeEditor.execCommand('mceFullScreen');

    </script>
@endsection
