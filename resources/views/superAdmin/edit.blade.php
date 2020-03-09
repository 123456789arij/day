@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')


            <div class="col-md-9">
                <div class="card">
                    <header class="card-header">
                        <p>modifier </p>
                    </header>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="POST" action="{{ route('superAdmin.update', $user->id ) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name"> <strong>nom  </strong></label>
                            <input type="text" class="form-control"  id="name" name="name"  value="{{ $user->name}}" required>
                        </div>
                        <div class="form-group">
                            <label for="email"> <strong>email</strong></label>
                            <input type="email" class="form-control"  id="email" name="email"  value="{{ $user->email}}" required>
                        </div>


                        <div class="form-group">
                            <label for="password"><strong>password</strong></label>
                            <input type="password" class="form-control"  id="password" name="password" required>
                        </div>

                        <button class="btn btn-lg btn-primary" type="submit" > save</button>
                        <a href="{{ route('superAdmin.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
