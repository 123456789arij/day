@extends('layouts.base')
@section('content')
    {{-- app-page-title--}}
    <div class="app-page-title">
        <div class="page-title-wrapper">
            {{-- page-title-wrapper--}}
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div> Employées  Dashboard
                {{--    <div class="page-title-subheading">This is an example dashboard created using build-in
                        elements and components
                    </div>--}}
                </div>
            </div>
            {{--   /page-title-wrapper--}}

            <div class="page-title-actions">
                <div class="d-inline-block dropdown text-center">
                    <button class="btn-shadow mb-2 mr-2 btn btn-info btn-lg">
                        <a href="{{route('Entreprise.Employee.create')}}"
                           style="color: white;font-size: 15px;">    <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa pe-7s-add-user " style="font-size: 20px;"></i>
                          </span>
                       Ajouter un nouveau employée  </a>&nbsp;&nbsp;
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--                /app-page-title--}}

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Total Des Employés</div>
                            <div class="widget-subheading">Last year expenses</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Products Sold</div>
                            <div class="widget-subheading">Revenue streams</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning">$3M</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Followers</div>
                            <div class="widget-subheading">People Interested</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger">45,9%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
            <div class="card mb-3 widget-content">
                <div class="widget-content-outer">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Income</div>
                            <div class="widget-subheading">Expected totals</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-focus">$147</div>
                        </div>
                    </div>
                    <div class="widget-progress-wrapper">
                        <div class="progress-bar-sm progress-bar-animated-alt progress">
                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54"
                                 aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                        </div>
                        <div class="progress-sub-label">
                            <div class="sub-label-left">Expenses</div>
                            <div class="sub-label-right">100%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

                <div class="card-header">Employees

                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                        <tr>
                            <th class="text-center">id </th>
                            <th class="text-center">nom</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Role</th>
                            <th  class="text-center" colspan="3">ACTIONS </th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                        <tr>
                            <td class="text-center text-muted">
                                {{ $employee->id }}
                            </td>
                            <td class="text-center text-muted">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                 <div class="widget-content-left mr-3">
                                            <div class="widget-content-left">
                                                <img src="{{asset($employee->image)}}"  class="rounded-circle" height="30px" width="30px" alt="im"/>
                                            </div>
                                        </div>
                                        <div class="widget-content-left flex2">
                                            <div class="widget-heading">
                                                {{ $employee->name }}   </div>
{{--                                            <div class="widget-subheading opacity-7">Web Developer</div>--}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center"> {{ $employee->email }}</td>
                            <td class="text-center">
                                <div class="badge badge-warning">{{ $employee->role }}</div>
                            </td>
                            <td class="text-center">
                                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-warning">
                                    <a href="{{ route('Entreprise.Employee.edit', $employee->id) }}" >
                                        <i class="pe-7s-note  btn-icon-wrapper" style="font-size: 20px;"></i>
                                    </a>
                                </button>
                            </td>
                            <td>
                                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-info">
                                    <a href="{{route('Entreprise.Employee.show', $employee->id) }})}}" >
                                        <i class="pe-7s-info  btn-icon-wrapper" style="font-size: 20px;"></i>
                                    </a>
                                </button>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('Entreprise.Employee.destroy',$employee->id) }}" method="post">.
                                    @csrf
                                    @method('DELETE')
                                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                                        <i class="pe-7s-trash btn-icon-wrapper" style="font-size: 20px;"> </i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <footer class="card-footer" style="float: right">
                        {{ $employees->links() }}
                    </footer>
                </div>

       {{--         <div class="d-block text-center card-footer">
                    <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger"><i
                            class="pe-7s-trash btn-icon-wrapper"> </i></button>
                    <button class="btn-wide btn btn-success">Save</button>
                </div>
--}}
            </div>
        </div>
    </div>
@endsection
