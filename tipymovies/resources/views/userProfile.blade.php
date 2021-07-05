    @extends('layouts.app')

    @section('content')
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="card-body px-lg-5 py-lg-5">
                <form method="POST" action="{{ route('user-profile-information.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right textoBold">{{ __('Nombre:') }}</label>

                        <div class="col-md-6">
                            <label id="name" type="name" class="form-control @error('name') is-invalid @enderror textoNegro" name="name">{{ old('name') ?? auth()->user()->name }}</label>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right textoBold">{{ __('Nombre de usuario:') }}</label>

                        <div class="col-md-6">
                            <label id="username" type="username" class="form-control @error('username') is-invalid @enderror textoNegro" name="name">{{ old('username') ?? auth()->user()->username }}</label>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right textoBold">{{ __('Correo electrónico') }}</label>

                        <div class="col-md-6">
                            <label id="email" type="email" class="form-control @error('email') is-invalid @enderror textoNegro" name="email">{{ old('email') ?? auth()->user()->email}}</label>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="container">
                        <table class="table table-dark" id="scores">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre de Usuario</th>
                                    <th scope="col">Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $cont = 1;
                                @endphp
                                @foreach($pelisUser as $pelis)
                                    <tr bgcolor="black">
                                    <td>{{ $pelis->$username }}</td>
                                    <td>{{ $pelis->$puntos }}</td>
                                </tr>
                                @php
                                $cont++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <a class="botoncito" href="{{ route('UpdateUser') }}" >Modificar datos</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"> </script>


<!--<script>

    $(function() {
        //var num = 1;
        //var u = "username";
        //var p = "puntos";
        window.__pelisUser = JSON.parse("{!!$pelisUser!!}");
        $.getJSON($pelisUser, function(data) {
            $.each(data, function(i, f) {
                //var = u.concat(num);
                //var = p.concat(num);
                var tblRow = "<tr>" + "<td>" + f.username1 + "</td>" + "<td>" + f.puntos1 + "</tr>";
                $(tblRow).appendTo("#scores tbody");
                //num = num + 1;
            });
        });
    });
</script>-->
@endsection
