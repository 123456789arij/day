@extends('layouts.base')
@section('cssBlock')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>
    <style>
        table.dataTable thead .sorting:after,
        table.dataTable thead .sorting:before,
        table.dataTable thead .sorting_asc:after,
        table.dataTable thead .sorting_asc:before,
        table.dataTable thead .sorting_asc_disabled:after,
        table.dataTable thead .sorting_asc_disabled:before,
        table.dataTable thead .sorting_desc:after,
        table.dataTable thead .sorting_desc:before,
        table.dataTable thead .sorting_desc_disabled:after,
        table.dataTable thead .sorting_desc_disabled:before {
            bottom: .5em;
        }

    </style>
@endsection
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
                <div> Package
                    {{--    <div class="page-title-subheading">This is an example dashboard created using build-in
                            elements and components
                        </div>--}}
                </div>
            </div>
            {{--   /page-title-wrapper--}}

            <div class="page-title-actions">
                <div class="d-inline-block dropdown text-center">
                    <button class="btn-shadow mb-2 mr-2 btn btn-alternate btn-lg">
                         <span class="btn-icon-wrapper pr-2 opacity-7">
                              <i class="fa pe-7s-add-user " style="font-size: 20px;"></i>
                          </span>
                        {{--  <a href="{{ route('superAdmin.Entreprise.create') }}"
                             style="color: white;font-size: 15px;">--}}
                        Ajouter une nouveau Package
                        {{--                              </a>&nbsp;&nbsp;--}}
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="main-card  card">
        <div class="card-header"> Package</div>
        <br>
        <div class="col-md-12 container">
            <table id="dtBasicExample" class="table table-hover mb-0" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th class="th-sm">id
                    </th>
                    <th class="th-sm">nom du package
                    </th>
                    <th class="th-sm">Max_employée
                    </th>
                    <th class="th-sm">prix annuel
                    </th>
                    <th class="th-sm">Prix ​​mensuel
                    </th>
                    <th class="th-sm">Module
                    </th>
                    <th class="th-sm">action
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td></td>
                    <td>
              <span class="table-remove">
                  <button type="button"
                          class="btn btn-danger btn-rounded btn-sm my-0">
                      Remove
                  </button></span>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>silver</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td></td>
                    <td>
              <span class="table-remove"><button type="button"
                                                 class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>gold</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td></td>
                    <td>
              <span class="table-remove"><button type="button"
                                                 class="btn btn-danger btn-rounded btn-sm my-0">Remove</button></span>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Saaaaaaaaaaact</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td></td>
                    <td>
              <span class="table-remove">
                  <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                      Remove</button>
              </span>
                    </td>
                </tr>
                </tbody>
            </table>


        </div>
    </div>

@endsection
@section('jsBlock')

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
        // Basic example
        $(document).ready(function () {
            $('#dtBasicExample').DataTable({
                "pagingType": "simple",// "simple" option for 'Previous' and 'Next' buttons only
                "order": [[3, "desc"]],
            });
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endsection
