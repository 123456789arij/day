<div class="col-md-3">


    <div class="card">
        <div class="card-header">SideBar</div>
        <a href="{{route('dashbord')}}" class="btn  btn-primary btn-block">Dashboard </a>
        <a href="{{ route('superAdmin.Entreprise.index')}}" class="btn  btn-primary btn-block"> Entreprises </a>
        <a href="{{ route('superAdmin.index') }}" class="btn  btn-primary btn-block"> Super Admin </a>
        <a href="{{route('Entreprise.Employee.index')}}" class="btn  btn-primary btn-block"> Employées </a>
        <a href="{{route('superAdmin.Package.index')}}" class="btn  btn-primary btn-block"> Packages </a>
        <a href="{{route('projet.home')}}" class="btn  btn-primary btn-block"> Projets </a>
        <a href="{{route('tache.index')}}" class="btn  btn-primary btn-block"> Tâches </a>
        <a href="#" class="btn btn-primary btn-block"> calandrier </a>


    </div>
    <br>

</div>


{{--

@section('template')

    <p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
@endsection
--}}
