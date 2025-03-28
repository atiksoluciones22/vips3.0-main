@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="form-auth">
        @csrf

        <div class="form-row">
            <div class="col-md-12 mb-3">
                <label for="EMAIL">Correo Electrónico</label>
                <input type="email" class="form-control @error('EMAIL') is-invalid @enderror" value="{{ old('EMAIL') }}"
                    id="EMAIL" placeholder="Correo Electrónico" name="EMAIL">
                @error('EMAIL')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    placeholder="Contraseña" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-md-12 mb-3">
                <label for="company">Empresa</label>
                <input type="text" class="form-control @error('company') is-invalid @enderror"
                    value="{{ old('company') }}" id="company" placeholder="Empresa" name="company">
                @error('company')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="ladda-button btn btn-primary btn-square btn-ladda" type="submit" data-style="expand-left">
                <span class="ladda-label">Acceder</span>
                <span class="ladda-spinner"></span>
            </button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    Olvidaste tu contraseña?
                </a>
            @endif
        </div>
    </form>
@endsection
