@extends('layouts.app')

@section('content')
    <div class="col-lg-12 p-0">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Configuración</h2>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('settings.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        <div class="col-md-12 mb-3 p-0">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" placeholder="Contraseña" name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3 p-0">
                            <label for="password_confirmation">Repetir Contraseña</label>

                            <input type="password" class="form-control" id="password_confirmation"
                                placeholder="Repetir Contraseña" name="password_confirmation">
                        </div>

                        <button class="ladda-button btn btn-primary btn-square btn-ladda" data-style="expand-left">
                            <span class="ladda-label">Establecer contraseña</span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
