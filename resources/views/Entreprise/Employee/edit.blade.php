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
                    Ajouter un nouveau Employée
                </div>

                <div class="tab-content">
                    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                {{--                                    <h5 class="card-title">Grid Rows</h5>--}}
                                <form action="{{ route('Entreprise.Employee.update', $employee->id ) }}" method="POST">
                                    {{--  partie email +adresse--}}
                                    <div class="form-row">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="name"> NOM </label>
                                                <input type="text" class="form-control" id="name" name="name" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" class="@error('email', 'login') is-invalid @enderror">
                                                @error('email', 'login')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="position-relative form-group">
                                                <label for="password" >Password</label>
                                                <input type="password" class="form-control" id="password" name="password" >
                                            </div>
                                        </div>
                                    </div>
                                    {{--    /  partie email +adresse--}}
                                    {{--                <div class="position-relative form-group">
                                                        <label for="exampleAddress" class="">Address</label>
                                                        <input name="address" id="exampleAddress" placeholder="1234 Main St" type="text" class="form-control">
                                                    </div>
                                                    <div class="position-relative form-group">
                                                        <label for="exampleAddress2" class="">Address 2</label>
                                                        <input name="address2" id="exampleAddress2" placeholder="Apartment, studio, or floor" type="text" class="form-control">
                                                    </div>
                                                    --}}{{--    partie sity state --}}{{--
                                                    <div class="form-row">
                                                            <div class="col-md-6">
                                                                <div class="position-relative form-group">
                                                                    <label for="exampleCity" class="">City</label>
                                                                    <input name="city" id="exampleCity" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="position-relative form-group">
                                                                    <label for="exampleState" class="">State</label>
                                                                    <input name="state" id="exampleState" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="position-relative form-group">
                                                                    <label for="exampleZip" class="">Zip</label>
                                                                    <input name="zip" id="exampleZip" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                    </div>--}}
                                    <div class="col">
                                        <label for="role">
                                            <strong> role</strong>
                                        </label>
                                        <div class="custom-control custom-radio" >
                                            <input class="custom-control-input"  id="1" type="radio" name="role"
                                                   value="1"  @if (old('role')=="employee")  checked @endif >
                                            <label class="custom-control-label" for="1" >
                                                Employée
                                            </label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input class="custom-control-input" type="radio" name="role" id="2"
                                                   value="2"  @if (old('role')=="admin")  checked @endif >
                                            <label class="custom-control-label" for="2">
                                                Admin
                                            </label>
                                        </div>
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
@endsection
