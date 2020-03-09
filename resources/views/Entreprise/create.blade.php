@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-9">
                <div class="card">
                    <header class="card-header">
                        <p> Ajouter un nouvel Employé</p>
                        <a class="btn btn-danger mb-2" style="float: right;" href="/Dashboard"> Back</a>
                    </header>


                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    {{--     @if ($errors->any())
                             <div class="alert alert-danger">
                                 <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif

                    <form method="POST"  action="{{ route('superAdmin.Employeer.store') }}" >

                        <div class="form-group">
                            @csrf
                            <label for="name"><strong>nom de l'Employé</strong></label>
                            <input type="text" class="form-control" id="name" name="name" required  >
                        </div>
                        <div class="form-group">
                            <label  for="email"> <strong>email de l'Employé</strong></label>
                            <input type="email" class="form-control"   id="email" name="email"class="@error('email', 'login') is-invalid @enderror" required>
                            @error('email', 'login')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password"><strong>password</strong></label>
                            <input type="password" class="form-control"  id="password" name="password"  required >
                        </div>



                        <div  class="form-group ">
                            <button class="btn btn-primary" type="submit" > save</button>
                            {{--                            <a href="{{ route('index') }}" class="btn btn-danger">Cancel</a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
