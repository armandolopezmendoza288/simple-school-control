@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container home">
            <div class="tab">
                <button class="tablinks" onclick="openCity(event, 'grupos')" id="defaultOpen">Grupos</button>
                @foreach ($grupos as $grupo)
                    <button class="tablinks" onclick="openCity(event, {{ $grupo->id }})">{{ $grupo->name }}</button>
                @endforeach
            </div>
            <div id="grupos" class="tabcontent">
                <h3>Grupos</h3>
                <p>Aqui puedes ver tus grupos y hacer pase de lista</p>
            </div>
            @foreach ($grupos as $grupo)
                <div id="{{ $grupo->id }}" class="tabcontent" style="display: none">
                    <h3>{{ $grupo->name }}</h3>
                    <p>Alumnos: </p>
                    <div class="col-md-12">
                        <div class="card card-user">
                            <div class="card-body">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Grupo</th>
                                        <th>Asistencia</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($alumnos as $alumno)
                                            <tr>
                                                <td style="max-width: 175px;">{{ $alumno->id }}</td>
                                                <td style="max-width: 175px;">{{ $alumno->name }}</td>
                                                <td style="max-width: 175px;">{{ $alumno->lastname }}</td>
                                                <td style="max-width: 175px;">{{ $grupo->name }}</td>
                                                <td style="max-width: 175px;"><label><input type="checkbox" id="cbox1" value="first_checkbox"></label><br>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                {{-- <div class="button-container">
                                    <a href="#" class="btn btn-sm btn-success mr-3">
                                        Imprimir
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function openCity(evt, grupoId) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(grupoId).style.display = "block";
          evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
@endsection
