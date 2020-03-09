@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('includes.profile_sidbar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                            <div>
                                <span class="h4 d-block font-weight-normal mb-2">
                                {{$user}}
                                    <i class="fa fa-circle" style="font-size:36px; background-color: cornflowerblue;color: white">
                                     </i>
                                </span>
                              <span class="font-weight-light"><strong>TOTAL </strong></span>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
