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
                    {{--        @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif--}}

                    <form  method="POST" action="{{ route('superAdmin.Entreprise.update', $user->id ) }}">
                        @csrf

                        @method('PATCH')

                        <div class="form-group">
                            <label for="name"> <strong>nom  </strong></label>
                            <input type="text" class="form-control"  id="name" name="name" required  value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email"> <strong>email</strong></label>
                            <input type="email" class="form-control"  id="email" name="email" required  value="{{ $user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="created_at"><strong>Joining Date</strong></label>
                            <input type="date"  class="form-control"  id="created_at" name="created_at"  required value="{{ $user->created_at}}">
                        </div>

                        <button class="btn btn-lg btn-primary" type="submit" > save</button>
                        <a href="{{ route('superAdmin.Entreprise.index') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
