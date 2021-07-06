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
                                    <th scope="col">Titulo de película</th>
                                    <th scope="col">Puntos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pelisUser as $peli)
                                <tr bgcolor="black">
                                    <td>{{ $peli['titulo']}}</td>
                                    <td>{{ $peli['puntos']}}</td>
                                </tr>
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
@endsection
