<div class="col-md-3">


    <div class="card">
        <div class="card-header">SideBar</div>
          <a href="{{route('dashbord')}}" class="btn  btn-primary btn-block">Dashboard </a>
{{--         <a href="{{route('superAdmin.edit')}}" class="btn  btn-primary btn-block"> profile  </a>--}}
        <a href="{{ route('superAdmin.Entreprise.index')}}"  class="btn  btn-primary btn-block"> Entreprises  </a>
      <a href="{{ route('superAdmin.index') }}" class="btn  btn-primary btn-block"> Super Admin </a>
        <a href="{{route('superAdmin.Package.index')}}"  class="btn  btn-primary btn-block"> Packages </a>
        <a href="{{route('projet.index')}}" class="btn  btn-primary btn-block"> Projets </a>
        <a href="{{route('tache.index')}}" class="btn  btn-primary btn-block"> Tâches </a>
        <a href="{{route('client.index')}}" class="btn  btn-primary btn-block"> clients </a>




    </div>
    <br>

</div>


{{--

@section('template')

    <p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>
@endsection
--}}
